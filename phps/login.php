<?php

    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;

    //validating

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
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

    $result = $conn->query("SELECT * FROM customertable");
    while($row = $result->fetch_assoc()) {
    echo "<div class='p-4 border border-amber-400 rounded'>
            <h2 class='text-xl font-semibold'>{$row['name']}</h2>
            <p>{$row['description']} - {$row['fee']}</p>
            <a href='vehicle.php?id={$row['id']}' class='text-amber-400 underline'>View Details</a>
            </div>";
    }


?>