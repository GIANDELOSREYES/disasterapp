<?php
include "conn.php";
include "config.php";

$object = new OOP($pdo);

$status = $_POST["status"] ?? "all";

$data = $object->getReportsByStatus($status);

echo json_encode($data);
?>