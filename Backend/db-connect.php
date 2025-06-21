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


function deposit($conn, $amount, $id) {
    if(countTransactions($conn, $id)>5){
        echo "You aren't allowed to make more than 5 transactions in a day";
    }
    else {
        $sql = "UPDATE Users SET Balance = Balance + $amount WHERE id = $id";
    }
}

function withdraw($conn, $amount, $id) {
    if(countTransactions($conn, $id)>5){
        echo "You aren't allowed to make more than 5 transactions in a day";
    }
    else {
        $sql = "UPDATE Users SET Balance = Balance - $amount WHERE id = $id";
    }
}

function countTransactions ($conn,$id){
    $sql = "SELECT COUNT(*) as TransactionCount FROM Transactions WHERE UserId='$id' and TransactionDate = CURDATE()";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return (int)$row['total'];
    }
}

// function to fetch the history
// fucniton to calculate the transaction happened in the same date ( let the limit to 3 transaction per day)
?>

