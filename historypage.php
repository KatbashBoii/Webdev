<?php include 'databaseconnect.php'; 

    $usertoken = $_COOKIE['auth_token'];

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Motors - Luxury Car Rental Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="stylesheets/homeStyles.css" rel="stylesheet">
</head>

<body class="hero-gradient bg-black">
    <!-- Navigation -->
    <nav class="nav-luxury fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="homepage.php">
                        <button class="focus:outline-none">
                            <div class="text-3xl font-bold luxury-font luxury-text">✦ Prestige Motors</div>
                        </button>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="homepage.php" class="text-white hover:text-yellow-400 px-3 py-2 text-sm font-medium tracking-wide transition-colors duration-300">HOME</a>
                        <a href="carlist.php" class="text-white hover:text-yellow-400 px-3 py-2 text-sm font-medium tracking-wide transition-colors duration-300">COLLECTION</a>
                        <?php if ($user): ?>
                            <div><a href="userpage.php"><button class="luxury-button text-white px-6 py-2 text-sm font-medium tracking-wide">HI, <?= $user['fname'] ;?> </button></a></div>
                            <?php else: ?>
                            <div><a href="registrypage.php"><button class="luxury-button text-white px-6 py-2 text-sm font-medium tracking-wide">MEMBER ACCESS</button></a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="overflow-y-auto pt-20 bg-black-400 items-center " >
        <div class="flex flex-row items-center mt-3 mb-5 ps-5">
           <a href="userpage.php" class="w-12 h-12 flex items-center justify-center hover:scale-110 duration-300">
                <img src="assets/icon/back-buttons-multimedia-svgrepo-com.svg" 
                    alt="Back" 
                    width="36" 
                    height="36" 
                    class="opacity-80 hover:opacity-100 transition-all duration-300">
            </a>
        <span class="font-bold text-white text-4xl ms-3">
            History
        </span>
        </div>
    </div>
    <?php

        //getting data
        $sql = "SELECT r.*, c.*, p.*
                FROM rentedtable r
                INNER JOIN cartable c ON r.CarID = c.ID
                INNER JOIN payment p ON r.CustomerID = p.CustomerID
                WHERE r.CustomerID = ? AND r.CarID = p.CarID";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $user['id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo '<div class="glass-effect flex flex-row premium-shadow rounded-lg  mx-16 mb-4 py-5">
                            <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 w-64 h-40 overflow-hidden flex items-center rounded-lg ">
                                <img class="w-full h-full object-cover " src="assets/ID'. htmlspecialchars($row["CarID"]) .'.jpg"/>
                            </div>
                            <div class="w-full flex  flex-col ms-4">
                                <div>
                                    <span class="font-extrabold text-gray-900 text-4xl italic">
                                        '. htmlspecialchars($row["Name"]) .'
                                    </span>
                                    <p class="text-sm text-gray-400 italic">Booking ID:C'. htmlspecialchars($row["CarID"]) .'C'. htmlspecialchars($row["CustomerID"]) .' </p>  
                                </div>
                                <div class="flex flex-col mt-3">
                                    <span class="text-3xl mt-3">From '. htmlspecialchars($row["DepartureDate"]) .' to '. htmlspecialchars($row["ReturnDate"]) .'('. htmlspecialchars($row["Days"]) .' Days)</span> 
                                    <span class="text-3xl mt-3">RS.'. htmlspecialchars($row["RentPerDay"]) .'/days  <span class=" my-1 inline-block w-1.5 h-1.5 bg-black rounded-full mx-2"></span>RS.'. htmlspecialchars($row["Total"]) .'</span> 
                                
                                </div>
                                <div class="mt-20 flex w-full pe-12">
                                    <div class="bg-gray-700 text-white w-28 text-center p-3 rounded-2xl">
                                        '. htmlspecialchars($row["Status"]) .'
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        }

        $stmt->close();
        $connection->close();
    ?>
    <script src="Javascripts/homescript.js"></script>

</body>
</html>