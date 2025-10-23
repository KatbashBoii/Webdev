<?php include 'databaseconnect.php'; ?>

<?php
session_start();

    $fName = $_POST["firstName"] ?? null;
    $lName = $_POST["lastName"] ?? null;
    $tel = $_POST["phoneNumber"] ?? null;
    $useremail = $_POST["email"] ?? null;
    $userPassword = $_POST["password"] ?? null;
    
    // Validatation and sanitizing data
    $fName = htmlspecialchars(trim($fName));
    $lName = htmlspecialchars(trim($lName));
    $tel = filter_var($tel, FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($useremail, FILTER_VALIDATE_EMAIL);

    if(!$useremail){
        die("Enter a valid email!");
    }

    if ($userPassword) {
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    }

    //verify email to avoid multiple entries

    $checkquery = "SELECT * FROM customertable WHERE Email = ?";
    $checkStmt = mysqli_prepare($connection, $checkquery);
    mysqli_stmt_bind_param($checkStmt,"s", $email);
    mysqli_stmt_execute($checkStmt);
    $result = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($result) > 0){
        echo "<script>alert('This email is already registered. Please log in instead.'); window.location.href='loginpage.php';</script>";
        exit;
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

    echo "<script>window.location.href = 'loginpage.php';</script>";
?>