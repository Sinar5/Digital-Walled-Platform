<?php 
$host = "localhost";         
$username = "your_username"; 
$password = "your_password"; 
$database = "DigitalWallet";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


// function for fetching the info for the profile ( username, contact info (info, phone number), and address)
// function to update the profile info
// function to do a deposit 
// function to do a withdraw
// function to fetch the history
// fucniton to calculate the transaction happened in the same date ( let the limit to 3 transaction per day)
?>