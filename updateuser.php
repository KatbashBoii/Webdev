<?php
include 'databaseconnect.php';


session_start();

if (!isset($_COOKIE['auth_token'])) {
    die("Unauthorized access.");
}

// Decode token to get user ID
$decoded = base64_decode($_COOKIE['auth_token'], true);
if (!$decoded) {
    die("Invalid token.");
}
$payload = json_decode($decoded, true);
$userID = htmlspecialchars($payload['id']);

$field = $_POST['field'] ?? '';
$value = $_POST['value'] ?? '';

// Allow only these fields to be updated
$allowedFields = ['firstname', 'lastname', 'email', 'phone'];

if (!in_array($field, $allowedFields)) {
    die("Invalid field.");
}

// Map JS field names to DB column names
$fieldMap = [
    'firstname' => 'Fname',
    'lastname'  => 'Lname',
    'email'     => 'Email',
    'phone'     => 'Phone'
];

$dbField = $fieldMap[$field];

// Prepare and update
$stmt = $connection->prepare("UPDATE customertable SET $dbField = ? WHERE ID = ?");
$stmt->bind_param("si", $value, $userID);

if ($stmt->execute()) {
    echo ucfirst($field) . " updated successfully!";
} else {
    echo "Error updating " . ucfirst($field);
}

$stmt->close();
$connection->close();
?>