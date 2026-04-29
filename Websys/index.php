<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="indexStyle.css">
	<title>DisasterWatch</title>
    <style>
        .marquee {
            margin-top: 5rem;
            font-size: 0.5rem;
             background: repeating-linear-gradient(
                to bottom,
                #ff2b2b 0px,
                #ff2b2b 2px,
                #d91f1f 2px,
                #d91f1f 4px
            );
            display: flex;
            overflow: hidden;
            user-select: none;
            height: 1.8rem;
        }

        .marquee ul {
            list-style: none;
            flex-shrink: 0;
            min-width: 100%;
            display: flex;
            justify-content: space-between;
            align-content: center;
            gap: 2rem;
            background: repeating-linear-gradient(
                to bottom,
                #ffffff 0px,
                #ffffff 2px,
                #dcdcdc 2px,
                #dcdcdc 4px
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
            margin:0;
            animation: scroll 50s linear infinite;
        }

        .marquee ul li {
            font-family: 'bebas';
            font-size: 1.3rem;

        }


        @keyframes scroll{
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-100%);
            }
        }

        .icons{
            font-size:3.5rem; 
            position: relative;
            overflow: hidden;
            opacity: 0.1;
        }

        .icons::before{
            content: " ";
            display: block;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(
                rgba(18, 16, 16, 0) 50%, 
                rgba(0, 0, 0, 0.25) 50%
            ), 
            linear-gradient(
                90deg, 
                rgba(255, 0, 0, 0.06), 
                rgba(0, 255, 0, 0.02), 
                rgba(0, 0, 255, 0.06)
            );
            z-index: 2;
            background-size: 100% 4px, 3px 100%;
            pointer-events: none;
        }

        .active-alerts-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #111827;
        color: #f8fafc;
    }

    .active-alerts-table th,
    .active-alerts-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        text-align: center;
    }

    .active-alerts-table thead tr:first-child th {
        background: linear-gradient(90deg, #ff5823, #ff9f30);
        color: #ffffff;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-size: 0.95rem;
    }

    .active-alerts-table thead th {
        background-color: rgba(255, 255, 255, 0.04);
        color: #d1d5db;
        font-weight: 700;
        font-size: 0.82rem;
    }

    .active-alerts-table tbody tr:nth-child(odd) {
        background-color: rgba(255, 255, 255, 0.02);
    }

    .active-alerts-table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.08);
    }

    .active-alerts-table .alert-severity {
        color: #ff7c7c;
        font-weight: 700;
    }

    .active-alerts-table .icon {
        font-size: 1.1rem;
        margin-right: 0.4rem;
        display: inline-block;
    }

    .alert-severity{
        font-famuly: 'bebas';
        font-size: 0.8rem;
    }

    </style>
</head>
<body style="background-color:#0a0a0a;height:100vh">
    <nav class="navbar navbar-expand-lg fixed-top" style="height:5rem">
    <div class="container-fluid">
        <div style="display:flex;flex-direction:row; align-items:center;gap:0.3rem;">
            <img src="images/logo.png" alt="logo" class="logo">
            <a class="navbar-brand" href="#">DISASTERWATCH</a>   
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title navbar-brand" id="offcanvasNavbarLabel">DISASTERWATCH</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Incident Report</a>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </nav>
    <div class="marquee">
        <ul>
            <li>📞Emergency:</li>
            <li>Hotline: 911</li>
            <li>CDRRMO: 0927-628-0498, 0999-678-4335, (074) 661-1455</li>
            <li>Emergency Medical Services (EMS): 0905-555-1911</li>
            <li>Fire: 0912-409-6114, (074) 442-2222, (074) 443-7089</li>
            <li>Red Cross: 0908-885-2707, (074) 442-4306</li>
        </ul>
        <ul aria-hidden="true">
            <li>📞Emergency:</li>
            <li>Hotline: 911</li>
            <li>CDRRMO: 0927-628-0498, 0999-678-4335, (074) 661-1455</li>
            <li>Emergency Medical Services (EMS): 0905-555-1911</li>
            <li>Fire: 0912-409-6114, (074) 442-2222, (074) 443-7089</li>
            <li>Red Cross: 0908-885-2707, (074) 442-4306</li>
        </ul>
    </div>
    <br>
    <br>

    <div class="container-fluid py-3">
    <div class="row g-3">

        <div class="col-12 col-lg-3">
            <div class="card" style="padding: 1rem;height: 8rem;border-radius:0;border-color:#6c6c78;border-top:5px solid red; background-color: #121a2a;">
                <div style="display:flex;flex-direction:row;" >
                    <div style="display:flex;flex-direction:column;width:100%;">
                     <h5 class="dashboardHead">ACTIVE ALERTS</h5>
                     <div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
                        <p class="dashboardnum" style="color:red">0</p>
                        <h5 class="icons">🚨</h5>   
                     </div>
                     
                    </div>
                    
                </div>
            
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card"  style="padding: 1rem;height: 8rem;border-radius:0;border-color:#6c6c78;border-top:5px solid #d97625;background-color: #121a2a">
            <div style="display:flex;flex-direction:row;" >
                <div style="display:flex;flex-direction:column;width:100%;">    
                    <h5 class="dashboardHead">INCIDENT REPORTS</h5>
                <div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
                <p class="dashboardnum" style="color:#d97625">0</p>
                 <h5 class="icons">📋</h5>
                </div>
                </div>         
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card"  style="padding: 1rem;height: 8rem;border-radius:0;border-color:#6c6c78;border-top:5px solid #00c863;background-color: #121a2a">
             <div style="display:flex;flex-direction:row;" >
                <div style="display:flex;flex-direction:column;width:100%;">     
                    <h5 class="dashboardHead">EVACUATION CENTERS</h5>
                    <div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
                        <p class="dashboardnum" style="color:#00c863">0</p>
                        <h5 class="icons">🏫</h5>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card"  style="padding: 1rem;height: 8rem;border-radius:0;border-color:#6c6c78;border-top:5px solid #0086f8;background-color: #121a2a">
                 <div style="display:flex;flex-direction:row;" >
                <div style="display:flex;flex-direction:column;width:100%;">     
                    <h5 class="dashboardHead">NOTIFICATIONS</h5>
                    <div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">
                        <p class="dashboardnum" style="color:#6c6c78">0</p>
                        <h5 class="icons">🔔</h5>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>
    </div>

    <br>
    <br>

<!-- ACTIVE ALERTS TABLE -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-7">
                <table class="active-alerts-table">
                    <thead>
                        <tr>
                            <th colspan="4" style="font-family:'bebas';font-size:1.3rem;">🚨 ACTIVE ALERTS</th>
                        </tr>
                        <tr>
                            <th style="font-family:'Menlo';font-size:0.9rem;">All</th>
                            <th style="font-family:'Menlo';font-size:0.9rem;">City-Wide Alert</th>
                            <th style="font-family:'Menlo';font-size:0.9rem;" colspan="2">Barangay Alert</th>
                        </tr>
                        <tr>
                            <th style="font-family:'Menlo';font-size:0.9rem;">DISASTER TYPE</th>
                            <th style="font-family:'Menlo';font-size:0.9rem;">SEVERITY</th>
                            <th style="font-family:'Menlo';font-size:0.9rem;">LOCATION</th>
                            <th style="font-family:'Menlo';font-size:0.9rem;">ISSUED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="icon" >🌀</span>Typhoon Warning</td>
                            <td><span class="alert-severity">CRITICAL</span></td>
                            <td  style="font-family:'Menlo'; font-size:0.8rem;">Brgy. 15</td>
                            <td  style="font-family:'Menlo'; font-size:0.8rem;">09:02</td>
                        </tr>
                        <tr>
                            <td><span class="icon">🌀</span>Typhoon Warning</td>
                            <td><span class="alert-severity">CRITICAL</span></td>
                            <td style="font-family:'Menlo'; font-size:0.8rem;">Brgy. 15</td>
                            <td style="font-family:'Menlo'; font-size:0.8rem;">09:02</td>
                        </tr>
                        <tr>
                            <td><span class="icon">🌀</span>Typhoon Warning</td>
                            <td><span class="alert-severity">CRITICAL</span></td>
                            <td style="font-family:'Menlo'; font-size:0.8rem;">Brgy. 15</td>
                            <td style="font-family:'Menlo'; font-size:0.8rem;">09:02</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-5">
                <table style="background-color:#19212f;width:100%;">
                    <thead>
                        <tr><td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem; font-family:'bebas';font-size:1.5rem;color: white" colspan="3">🏫 EVACUATION CENTERS</td></tr>
                        <th  style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'Menlo';font-size:0.8rem;color: white">Name</th>
                        <th  style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'Menlo';font-size:0.8rem;color: white;">Capacity</th>
                        <th  style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'Menlo';font-size:0.8rem;color: white;text-align:center;">Status</th>
                    </thead>
                    
                    <tr><td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'inter';font-size:1.1rem; font-weight:500;color: white">
                        Barangay Hall A <br>
                        <span style="font-family:'Menlo';font-size:0.8rem;color: white">San Roque Village</span>
                    </td>
                    <td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'Menlo';font-size:0.8rem;color: white;">54/200</td>
                    <td  style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'bebas';font-size:1.2rem;color: white; background-color: #4CAF50;text-align:center;">OPEN</td></tr>
                    <tr><td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'inter';font-size:1.1rem; font-weight:500;color: white">
                        Barangay Hall B <br>
                        <span style="font-family:'Menlo';font-size:0.8rem;color: white">San Luis Village</span>
                    </td>
                    <td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'Menlo';font-size:0.8rem;color: white;">6/200</td>
                    <td  style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'bebas';font-size:1.2rem;color: white; background-color: #4CAF50;text-align:center;">OPEN</td></tr>
                    <tr><td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'inter';font-size:1.1rem; font-weight:500;color: white;">
                        Barangay Hall C <br>
                        <span style="font-family:'Menlo';font-size:0.8rem;color: white">Upper Quirino</span>
                    </td>
                    <td style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'Menlo';font-size:0.8rem;color: white;">200/200</td>
                    <td  style="border-bottom:1px solid rgba(255, 255, 255, 0.12); padding:1rem;font-family:'bebas';font-size:1.2rem;color: white; background-color: #f44336;text-align:center;">FULL</td></tr>
                </table>
            </div>
        </div>
    </div>
	

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"> 
</script>

</html>