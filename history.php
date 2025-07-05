<?php
include 'connect.php';

$account_no = $_POST['account_no'];

$sql = "SELECT * FROM transactions WHERE account_no='$account_no' ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Transaction History</h2><table border='1'><tr><th>Type</th><th>Amount</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['type']}</td><td>₹{$row['amount']}</td><td>{$row['timestamp']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h2>No transactions found.</h2>";
}
?>
