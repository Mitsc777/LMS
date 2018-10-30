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

$cid=$_POST['courseid'];
$cname=$_POST['coursename'];
echo $cid;
echo $cname;
$sql= "INSERT INTO course (Course_id,Course_name) VALUES ('$cid','$cname')";
if ($conn->query($sql) === TRUE)
echo "New record added successfully";
else
echo "Error: ".$sql."<br>".$conn->error;
mysqli_close($conn);
?>