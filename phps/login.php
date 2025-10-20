<?php include 'databaseconnect.php'; ?>

<?php

    ob_start();

    $email = $_POST["email"] ?? null;
    $userPassword = $_POST["password"] ?? null;

    //validating

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$email || !$userPassword) {
        die("Please enter both email and password.");
    }


    $sql = "SELECT * FROM customertable WHERE Email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

        if (password_verify($userPassword, $user['Password'])) {
            echo "<script>window.location.href = '../HomePage.html';</script>";
            exit;
        }
        else {
            echo "<p class='text-red-500'>Invalid password.</p>";
            exit;
        }

    }  else {
            echo "<p class='text-red-500'>Email not found.</p>";
            exit;
            }

        
    ob_end_flush();
?>