<?php $page = 'dashboard'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.nav-link {
  color: rgba(255,255,255,0.75) !important;
  font-weight: 500;
  transition: 0.2s;
  position: relative;
}
.nav-link:hover { color:#fff !important; transform:translateY(-1px); }
.nav-link.active { color:#fff !important; }
.nav-link.active::after {
  content:"";
  position:absolute;
  left:0;
  bottom:-6px;
  width:100%;
  height:2px;
  background:#0d6efd;
}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2">
  <div class="d-flex flex-column me-5">
    <span class="navbar-brand fw-bold mb-0">Community Disaster Alert</span>
    <small class="text-secondary ms-1">ADMIN</small>
  </div>

  <div class="collapse navbar-collapse justify-content-center">
    <ul class="navbar-nav align-items-center gap-5">
      <li><a class="nav-link <?= ($page=='dashboard')?'active':'' ?>" href="index.php">Dashboard</a></li>
      <li><a class="nav-link" href="alerts.php">Alerts</a></li>
      <li><a class="nav-link" href="reports.php">Reports</a></li>
      <li><a class="nav-link" href="evacuation.php">Evacuation</a></li>
      <li><a class="nav-link" href="logs.php">API Logs</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <div class="row g-3">

    <div class="col-md-8">
      <div class="card p-3 h-100">
        <h5 class="mb-3">Recent Alerts</h5>
        <div id="recentList"></div>
      </div>
    </div>
    <div class="col-md-4 d-flex flex-column gap-3">

      <div class="card p-3">
        <h6>Alerts</h6>
        <h3 id="alertTotal">0</h3>
        <small id="alertSub">0 active | 0 resolved</small>
      </div>

      <div class="card p-3">
        <h6>Reports</h6>
        <h3>0</h3>
        <small>0 pending | 0 reviewed</small>
      </div>

      <div class="card p-3">
        <h6>Evacuation Centers</h6>
        <h3 id="evacTotal">0</h3>
        <small id="evacSub">0 full | 0 available</small>
      </div>

    </div>

  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card p-3">
        <h5>Baguio Weather</h5>
        <h3 id="temp">Loading...</h3>
        <small id="condition"></small>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-12">
      <div class="card p-3">
        <h5>Earthquakes</h5>
        <div id="quakeList">Loading...</div>
      </div>
    </div>
  </div>

</div>

<script>

function loadSummary() {
  fetch("alerts_api.php?summary=1")
  .then(r => r.json())
  .then(d => {
    document.getElementById("alertTotal").innerText = d.total;
    document.getElementById("alertSub").innerText = `${d.active} active | ${d.resolved} resolved`;
  });
}

function loadRecent() {
  fetch("alerts_api.php?recent=1")
  .then(r => r.json())
  .then(data => {

    let html = "";

    data.forEach(a => {

      let dot = a.status === "Active" ? "red" : "gray";

      html += `
      <div class="d-flex justify-content-between border-bottom py-2">

        <div class="d-flex gap-2">
          <div style="width:10px;height:10px;border-radius:50%;margin-top:6px;background:${dot};"></div>

          <div>
            <div class="fw-semibold">${a.title}</div>
            <small class="text-muted">${a.location_name ?? ''}</small>
          </div>
        </div>

        <small class="text-muted">
          ${new Date(a.created_at).toLocaleString()}
        </small>

      </div>`;
    });

    document.getElementById("recentList").innerHTML = html;
  });
}

function loadWeather() {
  fetch("https://api.open-meteo.com/v1/forecast?latitude=16.4023&longitude=120.5960&current_weather=true")
  .then(r => r.json())
  .then(data => {

    let w = data.current_weather;

    document.getElementById("temp").innerText = w.temperature + "°C";

    let c = "Unknown";
    if (w.weathercode == 0) c = "Clear";
    else if (w.weathercode <= 3) c = "Cloudy";
    else if (w.weathercode <= 48) c = "Foggy";
    else c = "Rainy";

    document.getElementById("condition").innerText = c;
  });
}

function loadEarthquakes() {

  fetch("phivolcs_api.php")
  .then(r => r.json())
  .then(data => {

    let html = "";

    data.forEach(q => {

      let place = (q.place || "").toLowerCase();

      if (
        place.includes("baguio") ||
        place.includes("benguet") 
      ) {

        let mag = parseFloat(q.mag) || 0;
        let time = new Date(q.time).toLocaleString();

        let color =
          mag >= 5 ? "red" :
          mag >= 4 ? "orange" :
          "green";

        html += `
        <div class="d-flex justify-content-between border-bottom py-2">

          <div>
            <span style="color:${color};font-weight:bold;">M${mag}</span>
            <div>${q.place}</div>
          </div>

          <small class="text-muted">${time}</small>

        </div>`;
      }
    });

    if (!html) {
      html = "<small>No recent earthquakes near Baguio.</small>";
    }

    document.getElementById("quakeList").innerHTML = html;
  })
  .catch(() => {
    document.getElementById("quakeList").innerHTML =
      "<small class='text-danger'>Failed to load PHIVOLCS data.</small>";
  });
}

function loadAll() {
  loadSummary();
  loadRecent();
  loadWeather();
  loadEarthquakes();
}

loadAll();
setInterval(loadAll, 10000);

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>