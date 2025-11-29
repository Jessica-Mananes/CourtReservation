<?php
include 'db.php';

$action = $_GET['action'];
$id = $_GET['id'];

if ($action === "approve") {
    $conn->query("UPDATE reservations SET status='Approved' WHERE id=$id");
} elseif ($action === "decline") {
    $conn->query("UPDATE reservations SET status='Declined' WHERE id=$id");
} elseif ($action === "delete") {
    $conn->query("DELETE FROM reservations WHERE id=$id");
}

echo "success";
?>
