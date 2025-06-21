<?php 
$host = "localhost";         
$username = "your_username"; 
$password = "your_password"; 
$database = "DigitalWallet";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

function create_profile($conn) {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $email =$_POST['email'];
    $password = $_POST['password'];

    $sql_user = "INSERT INTO Users (Username, PhoneNumber, Address, Email, Password, Balance)
    VALUES ($name, $phone_number, $address, $email, $password, 0 )";

    $sql_transaction = "INSERT INTO Transactions (Useremail, TransactionDate, TransactionType, Amount, Balance)
    VAlUES ($email, null , null ,0 , 0 )";


   check_query($conn, $sql_user);
   check_query($conn, $sql_transaction);
}

function get_profile_info($conn, $id) {
    $sql = "SELECT * FROM Users WHERE UserId = '$id' ";
}

// function to update profile info

function update_profile ($conn, $name, $phone_number, $address ) {
    $sql = "UPDATE Users SET Username='$name', PhoneNumber='$phone_number', Address='$address' WHERE id=2";

   check_query($conn, $sql);
}

function check_query($conn, $sql) {

    if ($conn->query($sql) === TRUE) {
        echo "Done!";
    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function transaction ($conn, $id, $amount, $type) {

    if(SumOfTransactions($conn, $id)>1000){
        echo "You aren't allowed to make more than 5 transactions in a day";
    } 
    else if ($type == TRUE){
        $sql_user = "UPDATE Users SET Balance = Balance + $amount WHERE Userid = $id";
        check_query($conn, $sql_user);
        $sql_transaction = "UPDATE Transactions SET Amount='$amount', TransactionType='$type', TransactionDate='CURDATE()' WHERE Userid = $id";
        check_query($conn, $sql_transaction);

    }
    else {
        $sql_user = "UPDATE Users SET Balance = Balance - $amount WHERE id = $id";
        check_query($conn, $sql_user);
        $sql_transaction = "UPDATE Transactions SET Amount='$amount', TransactionType='$type', TransactionDate='CURDATE()' WHERE Userid = $id";
        check_query($conn, $sql_transaction);
    }
}

function SumOfTransactions ($conn,$id){

    // should calculate the deposits and the withdraws then find the difference between them
    // the balance should not decrease more than 1000$ per day 
    // should return the amount of withdraws - deposits 
    // or i should only return the amount of withdraws and the user should not withdraw more than 1000$ per day
   
}

// function to fetch the history
// fucniton to calculate the transaction happened in the same date ( let the limit to 3 transaction per day)
?>

