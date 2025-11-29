<?php
include 'db.php';

$sql = "SELECT id, name, email, date_reserve, start_time, end_time, status FROM reservations ORDER BY id DESC";
$result = $conn->query($sql);

$reservations = [];
while($row = $result->fetch_assoc()){
    $reservations[] = $row;
}

echo json_encode($reservations);
?>
