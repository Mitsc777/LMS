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

$fineid=$_POST['fineid'];
$studentid=$_POST['studentid'];
$irid=$_POST['irid'];
$date=$_POST['date'];

$sql2= "SELECT * from issue_return WHERE IR_id=$irid";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $days_late=$row["days_late"];
    }
} else {
    echo "0 results";
}
if ($days_late>14)
echo $days_late;
$fineamt= $days_late*5;

echo "<hr>";
if ($days_late>0)
{
$sql= "INSERT INTO fine (Fine_id,Student_id,IR_id,Date,Fine_amt) VALUES ('$fineid','$studentid','$irid','$date',$fineamt)";
if ($conn->query($sql) === TRUE)
echo "New record added successfully";
else
echo "Error: ".$sql."<br>".$conn->error;
echo "<hr>";
}
else
{
echo "No fine applicable";	
}
mysqli_close($conn);
?>