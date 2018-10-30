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
</style>
<h1>Fine Report</h1>
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

$sql1 = "SELECT * FROM Fine";
$sql2 = "SELECT * FROM Student";
$sql3 = "SELECT * FROM Book";
$sql4 = "SELECT * FROM Book_copy";
$sql5 = "SELECT * FROM issue_return";
$sql6 = "SELECT * FROM fine_rules";

$result = $conn->query($sql1);
$result1 = $conn->query($sql2);
$result2 = $conn->query($sql3);
$result3 = $conn->query($sql4);
$result4 = $conn->query($sql5);

/*if ($result1->num_rows > 0) {
    
    while($row = $result1->fetch_assoc()) {
        echo "Student_id: " . $row["Student_id"]. " - Student Name: " . $row["Student_name"];
    }
} else {
    echo "0 results";
}*/

	
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
			while($row = $result1->fetch_assoc())
{				
			
				echo "<tr>
				<td>";
				echo $row["Student_id"];
				echo"</td>";
				echo "<td>";
				echo $row["Student_name"];
				echo "</td>";
				while($row = $result3->fetch_assoc())
					{
						
					echo "<td>";echo $row["Book_copy_id"];
					echo "</td>";
					break;
					}
				while($row = $result2->fetch_assoc())
					{
					echo "<td>";echo $row["Book_name"];
					echo "</td>";
					break;
					}
				while($row = $result4->fetch_assoc())
					{
					echo "<td>";echo $row["Issue_date"];
					echo "</td>";
					echo "<td>";echo $row["Return_date"];
					echo "</td>";
					echo "<td>";echo $row["days_late"];
					echo "</td>";
					break;
					}
				while($row = $result->fetch_assoc())
					{
					echo "<td>";echo $row["Fine_amt"];
					break;
					}
				echo "</tr>";
				
}		
		echo"</table>
		</center>";

?>