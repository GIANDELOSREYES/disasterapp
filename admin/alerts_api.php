<?php
include "conn.php";
include "config.php";
$alert = new OOP($pdo);
if(isset($_GET['fetch'])) {

    $data = $alert->getAlerts();
    if(!$data) $data = [];
    echo json_encode($data);
    exit;
}

if(isset($_POST['add'])) {

    $alert->insertAlert(
        $_POST['title'],
        $_POST['message'],
        $_POST['severity'],
        $_POST['location'],
        $_POST['scheduled_time'] ?? null
    );

    echo json_encode(["status" => "success"]);
    exit;
}

if(isset($_POST['resolve'])) {

    $alert->resolveAlert($_POST['id']);

    echo json_encode(["status" => "resolved"]);
    exit;
}

if(isset($_GET['summary'])) {

    $all = $alert->getAlerts();

    $total = count($all);
    $active = 0;
    $resolved = 0;

    foreach($all as $a){
        if($a['status'] == 'Active') $active++;
        else $resolved++;
    }

    echo json_encode([
        "total" => $total,
        "active" => $active,
        "resolved" => $resolved
    ]);
    exit;
}

if(isset($_GET['recent'])) {

    $data = $alert->getAlerts();
    $data = array_slice($data, 0, 5);

    echo json_encode($data);
    exit;
}