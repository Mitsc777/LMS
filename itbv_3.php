<?php
$servername = "localhost";
$username = "mitanshu";
$password = "mitanshu";
$database = "itbv";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$bookid=$_POST['bookid'];
$bookname=$_POST['bookname'];
$author=$_POST['author'];
$publisher=$_POST['publisher'];
$bookcopyid=$_POST['bookcopyid'];
$editionid=$_POST['editionid'];
$price=$_POST['price'];
$sql= "INSERT INTO book (Book_id,Book_name,Author,Publisher) VALUES ('$bookid','$bookname','$author','$publisher')";
$sql1= "INSERT INTO book_copy (Book_copy_id,Book_id,edition,price) VALUES ('$bookcopyid','$bookid','$editionid','$price')";
if ($conn->query($sql) === TRUE)
echo "New record added successfully";
else
echo "Error: ".$sql."<br>".$conn->error;

if ($conn->query($sql1) === TRUE)
echo "New record added successfully";
else
echo "Error: ".$sql."<br>".$conn->error;
mysqli_close($conn);
?>