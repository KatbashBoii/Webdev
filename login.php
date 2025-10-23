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

    $data_token = json_encode([
                    'fname' => $user['Fname'],
                    'lname' => $user['Lname'],
                    'id' => $user['ID'],
                    'status' =>true,
                    'timestamp' => time(),
                        ]);


    if(!empty($_POST["remme"])){
        $token = base64_encode($data_token);
        setcookie('auth_token', $token, time() + (86400 * 30), "/");
    }

    if (password_verify($userPassword, $user['Password'])) {
        echo "<script>
                confirm('Welcome');
                window.location.href = 'homepage.php';</script>";
        exit;
    }

    else {
        echo "<script>
                confirm('Wrong password');
                window.location.href = 'loginpage.php';
              </script>";
        exit;
    }

}  else {
        echo "<script>
                confirm('Wrong email');
                window.location.href = 'loginpage.php';
              </script>";
        exit;
        }

?>