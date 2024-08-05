<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: sign-in.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $id = $_POST['booking_id'];
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $pdo = null;
    } catch (PDOException $e) {
        die("Cancellation failed: " . $e->getMessage());
    }

    // Redirect with a success message query parameter
    header("Location: myBooking.php?status=deleted");
    exit();
} else {
    header("Location: myBooking.phpstatus=error");
    exit();
}
