<?php
    include 'databaseconnect.php';
    session_start();

    //get customer id from cookie
    $usertoken = $_COOKIE['auth_token'] ?? null;

    $user = NUll;

    if($usertoken){
        $decoded = base64_decode($usertoken, true);
        if($decoded !== false){
            $payload = json_decode($decoded, true);
            $user = ['fname' => htmlspecialchars($payload['fname']),
                     'lname' => htmlspecialchars($payload['lname']),
                     'id' => htmlspecialchars($payload['id'])
                    ];
        }
    }

    //get carid from url

    $ID = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $stmtcar = $connection->prepare("SELECT * FROM cartable WHERE ID = ? ");
    $stmtcar ->bind_param("i", $ID);
    $stmtcar ->execute();

    $result = $stmtcar ->get_result();
    $car = $result->fetch_assoc();



    //insertion to database

    $customerId = $user['id']; //FROM COOKIE
    $carId = $car["ID"]; //FROM DATABASE

    $paymentmethod = $_POST['paymentmethod'] ?? null;
    $departure = $_POST['departuredate'] ?? null;
    $return = $_POST['returndate'] ?? null;

    //calculating days
    $days = (strtotime($return) - strtotime($departure)) / (60 * 60 * 24);

    if (!$user) {
        echo("<script>
                alert('Please login first! Redirecting...');
                window.location.href = 'loginpage.php';
              </script>");
        exit;
    }

    $sql = "INSERT INTO payment (CarID, CustomerID, TypeOfPayment, DepartureDate, ReturnDate, Days)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("iisssi",$carId, $customerId, $paymentmethod, $departure, $return, $days);

    if ($stmt->execute()){
        echo "<script> 
                alert('Booking successful! Check History From User Page');
                window.location.href = 'homepage.php';
              </script>";
    }

    $stmt->close();
    $stmtcar->close();
    $connection->close();
    


?>