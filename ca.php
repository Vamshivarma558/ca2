<!DOCTYPE html>
 <head>
	<title>Open Source Project</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "my_database";
$datatable = "data";
$results_per_page = 3;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<?php
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;
$sql = "SELECT * FROM data ORDER BY first_name DESC LIMIT $start_from, ".$results_per_page;
$rs_result = $conn->query($sql); 
?> 
<table border="1" cellpadding="40">
<tr>
    <td bgcolor="#FF8C00"><strong>ID</strong></td>
    <td bgcolor="#FF8C00"><strong>First_Name</strong></td>
    <td bgcolor="#FF8C00"><strong>Last_Name</strong></td>
    <td bgcolor="#FF8C00"><strong>Email</strong></td></tr>
<?php 
 while($row = $rs_result->fetch_assoc()) {
?> 
            <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["first_name"]; ?></td>
	    <td><?php echo $row["last_name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            </tr>
<?php 
}; 
?> 
</table>
</html>
