<?php
include 'connect.php';

$account_no = $_POST['account_no'];
$amount = $_POST['amount'];

$sql = "UPDATE users SET balance = balance + $amount WHERE account_no = '$account_no'";
if ($conn->query($sql)) {
    $conn->query("INSERT INTO transactions (account_no, type, amount) VALUES ('$account_no', 'Deposit', $amount)");
    echo "<script>alert('₹$amount Deposited Successfully'); window.history.back();</script>";
} else {
    echo "<script>alert('Deposit failed'); window.history.back();</script>";
}
?>
