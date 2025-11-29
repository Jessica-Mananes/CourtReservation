<?php
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $date_reserve = $_POST['date_reserve'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    if (empty($name) || empty($email) || empty($date_reserve) || empty($start_time) || empty($end_time)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO reservations (name, email, date_reserve, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $date_reserve, $start_time, $end_time);

    if ($stmt->execute()) {
        echo "<script>alert('Reservation submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error submitting reservation: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: index.html");
    exit;
}
?>
