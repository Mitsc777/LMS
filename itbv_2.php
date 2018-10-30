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

$sid=$_POST['studentid'];
$sname=$_POST['studentname'];
$cid=$_POST['courseid'];
$add=$_POST['address'];
$contact=$_POST['contact'];
$sql= "INSERT INTO student (Student_id,Student_name,Course_id,Address,Contact_number) VALUES ('$sid','$sname','$cid','$add','$contact')";
if ($conn->query($sql) === TRUE)
echo "New record added successfully";
else
echo "Error: ".$sql."<br>".$conn->error;
mysqli_close($conn);
?>