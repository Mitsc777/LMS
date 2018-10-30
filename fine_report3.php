<html>
<body>
<style>
input[type=text], select {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

input[type=button],[type=submit] {
    width: 10%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button],[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="course.html">Course</a></li>
  <li><a href="Student.html">Student</a></li>
  <li><a href="Book.html">Book</a></li>
  <li><a href="ir.html">Issue/Return</a></li>
  <li><a href="Fine.html">Fine</a></li>
  <li><a class="active" href="fine_report3.php">Fine Report</a></li>
</ul>
<h1 align=center>Fine Report</h1>
<hr>
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
//echo "Connected successfully";
$total=0;

$sql= "SELECT ir.ir_id,ir.issue_date,s.Student_id,Student_name,f.fine_id,f.fine_amt,ir.return_date,ir.days_late,bc.Book_copy_id,b.Book_name FROM `student` as s INNER JOIN fine as f ON s.Student_id = f.Student_id INNER JOIN issue_return as ir ON f.ir_id = ir.ir_id INNER JOIN Book_copy as bc ON ir.Book_copy_id = bc.Book_copy_id INNER JOIN Book as b ON bc.Book_id = b.Book_id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<center>
		<table>
			<tr>
				<th>Student id</th>
				<th>Student name</th>
				<th>Book Copy id</th>
				<th>Book Name</th>
				<th>Issue date</th>
				<th>Return date</th>
				<th>Days Late</th>
				<th>Fine amount</th>
			</tr>";
    while($row = $result->fetch_assoc()) {
		$total+=$row["fine_amt"];
        echo "<tr><td> " . $row["Student_id"]."</td><td> ". $row["Student_name"] . " </td><td>".$row["Book_copy_id"] ." </td><td>" .$row["Book_name"]." </td><td>" . $row["issue_date"]." </td><td>" . $row["return_date"]." </td><td>" . $row["days_late"]. " </td><td>" . $row["fine_amt"]."</td></tr>";
    }
} else {
    echo "0 results";
}	
echo "<tr><td>Total = </td><td></td><td></td><td></td><td></td><td></td><td></td><td>$total</td></tr>";
		echo"</table>
		</center>";

?>