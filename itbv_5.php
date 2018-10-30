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

$irid=$_POST['irid'];
$studentid=$_POST['studentid'];
$bookcopyid=$_POST['bookcopyid'];
$idate=$_POST['idate'];
$ddate=$_POST['ddate'];
$rdate=$_POST['rdate'];
echo"<hr>";
$datetime1 = new DateTime($idate);

$datetime2 = new DateTime("$rdate");

$difference = $datetime1->diff($datetime2);
$late= $difference->d-14;
if($difference->d >14)
echo 'The book was returned '.($difference->d-14).' days late';

echo"<hr>";

$sql= "INSERT INTO issue_return (IR_id,Student_id,Issue_date,Due_date,Return_date,Book_copy_id,days_late) VALUES ('$irid','$studentid','$idate','$ddate','$rdate','$bookcopyid','$late')";
if ($conn->query($sql) === TRUE)
echo "New record added successfully";
else
echo "Error: ".$sql."<br>".$conn->error;
mysqli_close($conn);
?>