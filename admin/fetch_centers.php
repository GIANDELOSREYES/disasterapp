<?php
include "conn.php";

$status = $_POST["status"] ?? "all";

if($status == "all"){
    $sql = "SELECT * FROM centers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
else if($status == "open"){
    $sql = "SELECT * FROM centers WHERE capacity < 300";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
else if($status == "full"){
    $sql = "SELECT * FROM centers WHERE capacity >= 300";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>