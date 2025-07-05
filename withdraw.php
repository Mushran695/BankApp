<?php
include 'connect.php';

$account_no = $_POST['account_no'];
$amount = $_POST['amount'];

// Check if user exists and fetch current balance
$result = $conn->query("SELECT balance FROM users WHERE account_no = '$account_no'");
if ($result->num_rows === 0) {
    echo "<script>alert('Account not found'); window.history.back();</script>";
    exit;
}

$row = $result->fetch_assoc();
$current_balance = $row['balance'];

if ($amount > $current_balance) {
    echo "<script>alert('Insufficient balance'); window.history.back();</script>";
    exit;
}

// Deduct the amount
$sql = "UPDATE users SET balance = balance - $amount WHERE account_no = '$account_no'";
if ($conn->query($sql)) {
    // Record transaction
    $conn->query("INSERT INTO transactions (account_no, type, amount) VALUES ('$account_no', 'Withdraw', $amount)");
    echo "<script>alert('₹$amount Withdrawn Successfully'); window.history.back();</script>";
} else {
    echo "<script>alert('Withdrawal failed'); window.history.back();</script>";
}
?>
