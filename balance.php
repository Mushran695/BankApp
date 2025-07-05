<?php
include 'connect.php';

$account_no = $_POST['account_no'];

$sql = "SELECT balance FROM users WHERE account_no='$account_no'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Current Balance: ₹" . $row['balance'] . "</h2>";
} else {
    echo "<script>alert('Account not found'); window.history.back();</script>";
}
?>
