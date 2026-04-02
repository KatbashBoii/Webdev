<?php
include 'databaseconnect.php';

// Get user from cookie (same logic as homepage)
$usertoken = $_COOKIE['auth_token'] ?? null;
$customer_id = NULL;

if ($usertoken) {
    $decoded = base64_decode($usertoken, true);
    if ($decoded !== false) {
        $payload = json_decode($decoded, true);
        $customer_id = $payload['id'] ?? NULL;
    }
}

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    header('Content-Type: application/json');

    // Get form values
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format."]);
        exit;
    }

    // Prepare SQL
    $stmt = $connection->prepare("
        INSERT INTO user_comments (customer_id, name, email, message, created_at, updated_at)
        VALUES (?, ?, ?, ?, NOW(), NOW())
    ");

    $stmt->bind_param("isss", $customer_id, $name, $email, $message);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
  
    } else {
       echo json_encode(["status" => "error", "message" => "Database error"]);
    }

    $stmt->close();
}

$connection->close();
?>