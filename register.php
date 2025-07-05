<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';

$name = $_POST['name'];
$account_no = $_POST['account_no'];
$password = $_POST['password'];
$balance = $_POST['balance'];

// Check if user already exists
$check = "SELECT * FROM users WHERE account_no = '$account_no'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "<script>alert('Account number already exists'); window.history.back();</script>";
} else {
    $sql = "INSERT INTO users (name, account_no, password, balance) VALUES ('$name', '$account_no', '$password', '$balance')";
    
    if ($conn->query($sql) === TRUE) {
        echo "
        <html>
        <head><link rel='stylesheet' href='assets/style.css'></head>
        <body>
          <div class='form-container'>
            <h2>Account Created Successfully</h2>
            <p>Account No: <strong>$account_no</strong></p>
            <a href='login.html' class='btn'>Login Now</a>
          </div>
        </body>
        </html>
        ";
    } else {
        echo "<script>alert('Something went wrong during registration'); window.history.back();</script>";
    }
}
?>
