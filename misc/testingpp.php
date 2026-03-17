<?php
header("Content-Type: text/xml");

$id = $_GET['id'];

$conn = new mysqli("localhost","root","","vehicledb");

$result = $conn->query("SELECT * FROM cartable WHERE ID=$id");

$row = $result->fetch_assoc();

echo "<Car>";
echo "<ID>".$row['ID']."</ID>";
echo "<Name>".$row['Name']."</Name>";
echo "<Type>".$row['Type']."</Type>";
echo "<RentPerDay>".$row['RentPerDay']."</RentPerDay>";
echo "</Car>";
?>