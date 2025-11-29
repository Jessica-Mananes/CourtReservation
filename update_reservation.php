<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$date = $data['date'];
$start_time = $data['start_time'];
$end_time = $data['end_time'];
$status = $data['status'];

$stmt = $conn->prepare("UPDATE reservations SET name=?, date_reserve=?, start_time=?, end_time=?, status=? WHERE id=?");
$stmt->bind_param("sssssi", $name, $date, $start_time, $end_time, $status, $id);
$stmt->execute();
$stmt->close();
$conn->close();
?>
