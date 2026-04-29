<?php $page = 'alerts'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Alerts</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.nav-link {
  color: rgba(255,255,255,0.75) !important;
  font-weight: 500;
  transition: 0.2s;
  position: relative;
}

.nav-link:hover {
  color: #fff !important;
  transform: translateY(-1px);
}

.nav-link.active {
  color: #fff !important;
}

.nav-link.active::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -6px;
  width: 100%;
  height: 2px;
  background: #0d6efd;
}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid px-4">

    <div class="d-flex flex-column me-5">
      <span class="navbar-brand fw-bold mb-0">Community Disaster Alert</span>
      <small class="text-secondary ms-1">ADMIN</small>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="nav">
      <ul class="navbar-nav align-items-center gap-5">

        <li><a class="nav-link <?= ($page=='dashboard')?'active':'' ?>" href="index.php">Dashboard</a></li>
        <li><a class="nav-link <?= ($page=='alerts')?'active':'' ?>" href="alerts.php">Alerts</a></li>
        <li><a class="nav-link" href="reports.php">Reports</a></li>
        <li><a class="nav-link" href="evacuation.php">Evacuation</a></li>
        <li><a class="nav-link" href="logs.php">API Logs</a></li>

      </ul>
    </div>

  </div>
</nav>

<div class="container mt-3">

<button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modal">
  + Issue Alert
</button>

<div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
  <div id="toast" class="toast text-white bg-success border-0">
    <div class="d-flex">
      <div class="toast-body">Alert Created</div>
      <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<table class="table table-bordered table-hover">
  <thead class="table-dark">
    <tr>
      <th>Severity</th>
      <th>Title</th>
      <th>Location</th>
      <th>Status</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody id="tableBody"></tbody>
</table>

</div>

<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Issue Alert</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <input id="title" class="form-control mb-2" placeholder="Title">
        <textarea id="message" class="form-control mb-2" placeholder="Message"></textarea>

        <select id="severity" class="form-select mb-2">
          <option>Low</option>
          <option>Medium</option>
          <option>High</option>
          <option>Critical</option>
        </select>

        <select id="location" class="form-select mb-2">
          <option value="">Baguio City (All Barangays)</option>
          <?php
            $db = new PDO("mysql:host=localhost;port=3307;dbname=disasterapp","root","");
            $q = $db->query("SELECT id,name FROM locations ORDER BY name ASC");
            while($r = $q->fetch(PDO::FETCH_ASSOC)){
              echo "<option value='{$r['id']}'>{$r['name']}</option>";
            }
          ?>
        </select>

        <input id="time" type="datetime-local" class="form-control mb-2">

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" onclick="addAlert()">Submit</button>
      </div>

    </div>
  </div>
</div>

<script>

function loadAlerts() {

  fetch("alerts_api.php?fetch=1")
  .then(res => res.json())
  .then(data => {

    if (!Array.isArray(data)) return;

    let rows = "";

    data.forEach(a => {

      let location;

      if (!a.location_id) {
        location = "Baguio City (All Barangays)";
      } else if (a.location_name) {
        location = a.location_name;
      } else {
        location = "Unknown";
      }

      rows += `
      <tr>
        <td>${a.severity ?? ''}</td>
        <td>${a.title ?? ''}</td>
        <td>${location}</td>
        <td>
          <span class="badge bg-${a.status=='Active'?'danger':'secondary'}">
            ${a.status}
          </span>
        </td>
        <td>${a.created_at ?? ''}</td>
        <td>
          ${a.status=='Active'
            ? `<button class="btn btn-sm btn-success" onclick="resolve(${a.id})">Resolve</button>`
            : `<span class="text-muted">Done</span>`}
        </td>
      </tr>`;
    });

    document.getElementById("tableBody").innerHTML =
      rows || "<tr><td colspan='6'>No alerts</td></tr>";
  })
  .catch(err => console.error("API error:", err));
}

function addAlert() {

  let form = new FormData();
  form.append("add", 1);
  form.append("title", document.getElementById("title").value);
  form.append("message", document.getElementById("message").value);
  form.append("severity", document.getElementById("severity").value);

  let loc = document.getElementById("location").value;
  form.append("location", loc === "" ? "" : loc);

  form.append("scheduled_time", document.getElementById("time").value);

  fetch("alerts_api.php", {
    method: "POST",
    body: form
  })
  .then(res => res.json())
  .then(() => {

    bootstrap.Modal.getInstance(document.getElementById("modal")).hide();

    document.getElementById("title").value = "";
    document.getElementById("message").value = "";
    document.getElementById("severity").value = "Low";
    document.getElementById("location").value = "";
    document.getElementById("time").value = "";

    new bootstrap.Toast(document.getElementById("toast")).show();

    loadAlerts();
  });
}

function resolve(id) {

  let form = new FormData();
  form.append("resolve", 1);
  form.append("id", id);

  fetch("alerts_api.php", {
    method: "POST",
    body: form
  })
  .then(() => loadAlerts());
}

loadAlerts();
setInterval(loadAlerts, 5000);

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>