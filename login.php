<?php
include 'connect.php';

$account_no = $_POST['account_no'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE account_no='$account_no' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    session_start();
    $_SESSION['account_no'] = $account_no;
    header("Location: dashboard.html");
} else {
    echo "<script>alert('Invalid account number or password'); window.location.href='../pages/login.html';</script>";
}
?>
