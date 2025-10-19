<?php
if ($_POST) {
    $fName = $_POST["firstName"] ?? null;
    $lName = $_POST["lastName"] ?? null;
    $tel = $_POST["phoneNumber"] ?? null;
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;
    
    // Validatation and sanitizing data
    $fName = htmlspecialchars(trim($fName));
    $lName = htmlspecialchars(trim($lName));
    $tel = filter_var($tel, FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    var_dump($fName, $lName, $tel, $email, $password);
    
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>