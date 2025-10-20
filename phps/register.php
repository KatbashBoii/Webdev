<?php include 'databaseconnect.php'; ?>

<?php

    ob_start();

    $fName = $_POST["firstName"] ?? null;
    $lName = $_POST["lastName"] ?? null;
    $tel = $_POST["phoneNumber"] ?? null;
    $email = $_POST["email"] ?? null;
    $userPassword = $_POST["password"] ?? null;
    
    // Validatation and sanitizing data
    $fName = htmlspecialchars(trim($fName));
    $lName = htmlspecialchars(trim($lName));
    $tel = filter_var($tel, FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    if ($userPassword) {
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    }

    $sql = "INSERT INTO customertable (Fname, Lname, Phone, Email, Password)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($connection);

    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, "sssss",
                            $fName,
                            $lName,
                            $tel,
                            $email,
                            $hashedPassword);

    mysqli_stmt_execute($stmt);

    echo "ayo something happened?";

     ob_end_flush();
?>