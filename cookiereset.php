<?php
   setcookie('auth_token', '', time() - 3600, '/');
    // Redirect to homepage or login page
    echo "<script>window.location.href = 'homepage.php';</script>";
    exit;
?>