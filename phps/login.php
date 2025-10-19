<?php

    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;

    //validating

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$email || !$password) {
        die("Please enter both email and password.");
    }

    $host = "localhost";
    $dbname = "vehicledb";
    $username = "root";
    $password = "";

    $connection = mysqli_connect(hostname: $host,
                                username: $username,
                                password: $password,
                                database: $dbname);

    if (mysqli_connect_errno()){
        die("Connection error: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM customertable WHERE Email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

        if (password_verify($_POST["password"], $user['password_hash'])) {
            header("Location: HomePage.html");
        }
        else {
            echo "<p class='text-red-500'>Invalid password.</p>";
        }

    }   else {
            echo "<p class='text-red-500'>Email not found.</p>";
            }

        
    
?>