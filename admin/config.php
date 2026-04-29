<?php
include "conn.php";
class OOP{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo; 
    }
    public function getAllReports(){
        $sql = "SELECT * FROM reports ORDER BY report_date DESC";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReportsByStatus($status){
        if($status == "all"){
            $sql = "SELECT * FROM reports ORDER BY report_date DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "SELECT * FROM reports WHERE status = ? ORDER BY report_date DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$status]);
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //ADMIN DASHBOARD
    public function insertAlert($title, $message, $severity, $location_id = null, $scheduled_time = null) {
        if ($location_id === "" || $location_id === 0) {
            $location_id = null;
        }
        $insert = "INSERT INTO alerts (title, message, severity, location_id, status, scheduled_time, created_at) VALUES (?, ?, ?, ?, 'Active', ?, NOW())";
        $result = $this->pdo->prepare($insert);
        return $result->execute([
            $title,
            $message,
            $severity,
            $location_id,
            $scheduled_time
        ]);
    }

    public function getAlerts() {
        $read = "SELECT alerts.*, locations.name AS location_name
            FROM alerts LEFT JOIN locations ON alerts.location_id = locations.id ORDER BY alerts.created_at DESC";
        $result = $this->pdo->prepare($read);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getActiveAlerts() {
        $readActive = "SELECT * FROM alerts WHERE status = 'Active' AND (scheduled_time IS NULL OR scheduled_time <= NOW()) ORDER BY created_at DESC";
        $result = $this->pdo->prepare($readActive);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function resolveAlert($id) {
        $update = "UPDATE alerts SET status = 'Resolved', updated_at = NOW() WHERE id = ?";
        $result = $this->pdo->prepare($update);
        return $result->execute([$id]);
    }
}

?>