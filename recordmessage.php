<?php
// Clear any output buffering and suppress output
if (ob_get_level()) ob_end_clean();
error_reporting(0);
ini_set('display_errors', 0);

//setting headers

header('Content-Type: application/xml; charset=utf-8');
header('Cache-Control: no-cache');

include 'databaseconnect.php';

// Get user from cookie
$usertoken = $_COOKIE['auth_token'] ?? null;
$customer_id = NULL;

if ($usertoken) {
    $decoded = base64_decode($usertoken, true);
    if ($decoded !== false) {
        $payload = json_decode($decoded, true);
        $customer_id = $payload['id'] ?? NULL;
    }
}

//function to send xml response
function sendXMLResponse($status, $message) {
    // Clear any output buffering
    if (ob_get_level()) ob_end_clean();

    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;
    
    $root = $xml->createElement('response');
    $xml->appendChild($root);
    
    $statusEl = $xml->createElement('status', htmlspecialchars($status, ENT_XML1));
    $messageEl = $xml->createElement('message', htmlspecialchars($message, ENT_XML1));
    
    $root->appendChild($statusEl);
    $root->appendChild($messageEl);
    
    echo '<?xml-stylesheet type="text/xsl" href="response.xsl"?>';
    echo $xml->saveXML($root);
    exit;
}

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        sendXMLResponse("error", "All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendXMLResponse("error", "Invalid email format.");
    }

    //check dublicates
    $check_stmt = $connection->prepare("SELECT id FROM user_comments WHERE email = ? LIMIT 1");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        sendXMLResponse("error", "A message from this email already exists.");
        $check_stmt->close();
        exit;
    }
    $check_stmt->close();


    // preparing SQL stmt
    $stmt = $connection->prepare("
        INSERT INTO user_comments (customer_id, name, email, message, created_at, updated_at)
        VALUES (?, ?, ?, ?, NOW(), NOW())
    ");

    $stmt->bind_param("isss", $customer_id, $name, $email, $message);

    if ($stmt->execute()) {
        sendXMLResponse("success", "Message sent successfully!");
    } else {
        sendXMLResponse("error", "Database error");
    }

    $stmt->close();
}

$connection->close();
exit;
?>