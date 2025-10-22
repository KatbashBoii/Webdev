<?php include 'databaseconnect.php'; ?>

<?php
session_start();

    $email = $_POST["email"] ?? null;
    $userPassword = $_POST["password"] ?? null;
    $remme = $_POST["remme"] ?? null;

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

    if(!empty($_POST["remme"])){
        $remember_token = bin2hex(random_bytes(32));
        setcookie('remember_me', $remember_token, time() + (86400 * 30), "/");
    }

    if (password_verify($userPassword, $user['Password'])) {
        echo "<script>window.location.href = '../brochomepage.html';</script>";
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

?>