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
<div>
    <center><h1>Logs hehe</h1></center>
</div>
</body>