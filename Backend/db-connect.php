<?php 
$host = "localhost";         
$username = "your_username"; 
$password = "your_password"; 
$database = "DigitalWallet";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

function Create_profile($conn) {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $email =$_POST['email'];
    $password = $_POST['password'];

    $sql_user = "INSERT INTO Users (Username, PhoneNumber, Address, Email, Password, Balance)
    VALUES ('$name', '$phone_number', '$address', '$email', '$password', 0 )";

    $sql_transaction = "INSERT INTO Transactions (Useremail, TransactionDate, TransactionType, Amount, Balance)
    VAlUES ('$email', null , null ,0 , 0 )";

    // TO-DO: use prepared statement for security! 

   Check_query($conn, $sql_user);
   Check_query($conn, $sql_transaction);
}

function Get_profile_info($conn, $id) {
    $sql = "SELECT * FROM Users WHERE UserId = '$id' ";
    Check_query($conn, $sql);
    $result = $conn->query($sql);

    
    foreach ($result as $row){
        // print profile info 
    }
}

function Update_profile ($conn, $name, $phone_number, $address ) {
    $sql = "UPDATE Users SET Username='$name', PhoneNumber='$phone_number', Address='$address' WHERE id=2";

   Check_query($conn, $sql);
}

function Check_query($conn, $sql) {

    if ($conn->query($sql) === TRUE) {
        echo "Done!";
    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function Transaction ($conn, $id, $amount, $type) {

    if ($type == TRUE){
        $sql_user = "UPDATE Users SET Balance = Balance + $amount WHERE Userid = $id";
        Check_query($conn, $sql_user);
        $sql_transaction = "UPDATE Transactions SET Amount='$amount', TransactionType='$type', TransactionDate='CURDATE()' WHERE Userid = $id";
        Check_query($conn, $sql_transaction);

    }
    else  if(SumOfTransactions($conn, $id)>1000){
        echo "You aren't allowed to withdraw anymore today. Try again tomorrow.";
    } 
    else {
        $sql_user = "UPDATE Users SET Balance = Balance - $amount WHERE id = $id";
        Check_query($conn, $sql_user);
        $sql_transaction = "UPDATE Transactions SET Amount='$amount', TransactionType='$type', TransactionDate='CURDATE()' WHERE Userid = $id";
        Check_query($conn, $sql_transaction);
    }
}

function SumOfTransactions ($conn,$id):int {

    $sql_deposits = "SELECT SUM(Amount) as Total FROM Transactions WHERE Userid = $id AND TransactionDate = CURDATE() AND TransactionType='TRUE'";
    $sql_withdraws = "SELECT SUM(Amount) as Total FROM Transactions WHERE Userid= $id AND TransactionDate = CURDATE() AND TransactionType='False'";
    $result_deposits = $conn->query($sql_deposits);
    $result_withdraws = $conn->query($sql_withdraws);

    $Transactions = $result_withdraws['total']- $result_deposits['total'];
    return $Transactions;
    
    // should i only return the amount of withdraws and the user should not withdraw more than 1000$ per day
}

function Get_History($conn, $id) {
    $sql = "SELECT * FROM Transactions WHERE Userid = $id";
    $result = $conn->query($sql); 

    foreach($result as $row){
        //print result as a check 
    }
}
?>