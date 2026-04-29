<?php
include "conn.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
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
        <main>
        <h1>Incident Reports</h1>
        <hr>
        <ul>
            <li><button onclick="getAllReports()">All</button></li>
            <li><button onclick="getPendingReports()">Pending</button></li>
            <li><button onclick="getReviewedReports()">Reviewed</button></li>
        </ul>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Reporter</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table-data">
            </tbody>
        </table>
    </main>
    <script>
        function getAllReports(){
            let fd = new FormData();
            fd.append("status", "all");
            fetch("fetch_reports.php", {
                method: "POST",
                body: fd
            })
            .then(response => response.json())
            .then(data => {
                let output = "";
                for(let i = 0; i < data.length; i++){
                    output += "<tr>";
                    output += "<td>" + data[i].id + "</td>";
                    output += "<td>" + data[i].type + "</td>";
                    output += "<td>" + data[i].reporter + "</td>";
                    output += "<td>" + data[i].location + "</td>";
                    output += "<td>" + data[i].status + "</td>";
                    output += "<td>" + data[i].report_date + "</td>";
                    output += "<td><button>Review</button></td>";
                    output += "</tr>";
                }
                document.getElementById("table-data").innerHTML = output;
            });
}

        function getPendingReports(){
            let fd = new FormData();
            fd.append("status", "pending");

            fetch("fetch_reports.php", {
                method: "POST",
                body: fd
            })
            .then(response => response.json())
            .then(data => {
                let output = "";
                for(let i = 0; i < data.length; i++){
                    output += "<tr>";
                    output += "<td>" + data[i].id + "</td>";
                    output += "<td>" + data[i].type + "</td>";
                    output += "<td>" + data[i].reporter + "</td>";
                    output += "<td>" + data[i].location + "</td>";
                    output += "<td>" + data[i].status + "</td>";
                    output += "<td>" + data[i].report_date + "</td>";
                    output += "<td><button>Review</button></td>";
                    output += "</tr>";
                }
                document.getElementById("table-data").innerHTML = output;
            });
}

        function getReviewedReports(){
            let fd = new FormData();
            fd.append("status", "reviewed");

            fetch("fetch_reports.php", {
                method: "POST",
                body: fd
            })
            .then(response => response.json())
            .then(data => {

                let output = "";

                for(let i = 0; i < data.length; i++){
                    output += "<tr>";
                    output += "<td>" + data[i].id + "</td>";
                    output += "<td>" + data[i].type + "</td>";
                    output += "<td>" + data[i].reporter + "</td>";
                    output += "<td>" + data[i].location + "</td>";
                    output += "<td>" + data[i].status + "</td>";
                    output += "<td>" + data[i].report_date + "</td>";
                    output += "<td><button>Review</button></td>";
                    output += "</tr>";
                }

                document.getElementById("table-data").innerHTML = output;
            });
}
getAllReports();
    </script>
    </body>
</html>