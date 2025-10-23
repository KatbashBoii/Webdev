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
                            <div><a href="registrypage.php"luxury-button text-white px-6 py-2 text-sm font-medium tracking-wide">MEMBER ACCESS</button></a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="h-screen overflow-y-auto pt-20 bg-black-400 items-center " >
       

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

        <!-- completed -->
        <!-- 1st entry-->
        <div class="glass-effect premium-shadow flex flex-col md:flex-row items-center rounded-2xl mx-6 md:mx-16 mb-6 md:mb-10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl border-yellow-400">
    
        <!-- Car Image -->
        <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 rounded-2xl overflow-hidden flex-shrink-0 w-full md:w-1/3 flex justify-center items-center">
            <img src="assets/MB S580.jpg" alt="Mercedes S-Class" class="w-full h-full object-cover opacity-95 " />
        </div>

        <!-- Booking Details -->
        <div class="flex flex-col justify-center md:ms-8 mt-6 md:mt-0 w-full">
        
        <!-- Title + Booking ID -->
        <div class="mb-3">
            <h2 class="text-3xl md:text-4xl font-extrabold text-black luxury-font tracking-tight italic">Mercedes S-Class</h2>
            <p class="text-sm text-black italic">Booking ID: <span class="text-grey-500 font-semibold">PMR-2025-0342</span></p>
        </div>

        <!-- Booking Info -->
        <div class="space-y-3 mt-2">
            <p class="text-lg md:text-2xl text-gray-800 font-semibold">
                <span class="text-grey-500">March 15 2025</span> - <span class="text-grey-500">March 21 2025</span> 
                <span class="text-gray-600 italic">(7 Days)</span>
            </p>

            <p class="text-lg md:text-2xl text-grey-500 font-bold flex items-center">
                Rs20k/day
                <span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mx-3"></span>
                <span class="text-yellow-600">Rs140k total</span>
            </p>
        </div>

        <!--Pickup detail-->
         <div class="mt-20 flex w-full pe-12 justify-between items-center ">
                 <p class="text-xl text-black mt-1">
                    Pickup: <span class="text-gray-700 font-medium">Grand Baie</span> <span class=" my-1 inline-block w-1.5 h-1.5 bg-black rounded-full mx-2"></span>
                    Return: <span class="text-gray-700 font-medium">Moka</span> 
                </p>

            <!--Status bar-->
           <div class="absolute-right bg-green-700 text-white w-28 text-center p-3 rounded-2xl">
                    completed
                </div>
                
            </div>
           </div>
        </div>
    </div>
</div>

           

         <!-- 1st entry-->
        <div class="glass-effect premium-shadow flex flex-col md:flex-row items-center rounded-2xl mx-6 md:mx-16 mb-6 md:mb-10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl border-yellow-400">
    
        <!-- Car Image -->
        <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 rounded-2xl overflow-hidden flex-shrink-0 w-full md:w-1/3 flex justify-center items-center">
            <img src="assets/rs6.jpg" alt="Audi RS6" class="w-full h-full object-cover opacity-95 " />
        </div>

        <!-- Booking Details -->
        <div class="flex flex-col justify-center md:ms-8 mt-6 md:mt-0 w-full">
        
        <!-- Title + Booking ID -->
        <div class="mb-3">
            <h2 class="text-3xl md:text-4xl font-extrabold text-black luxury-font tracking-tight italic">Audi RS6</h2>
            <p class="text-sm text-black italic">Booking ID: <span class="text-grey-500 font-semibold">PMR-2025-0342</span></p>
        </div>

        <!-- Booking Info -->
        <div class="space-y-3 mt-2">
            <p class="text-lg md:text-2xl text-gray-800 font-semibold">
                <span class="text-grey-500">October 18 2025</span> - <span class="text-grey-500">October 31 2025</span> 
                <span class="text-gray-600 italic">(13 Days)</span>
            </p>

            <p class="text-lg md:text-2xl text-grey-500 font-bold flex items-center">
                Rs13.2k/day
                <span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mx-3"></span>
                <span class="text-yellow-600">Rs171k total</span>
            </p>
        </div>

        <!--Pickup detail-->
         <div class="mt-20 flex w-full pe-12 justify-between items-center ">
                 <p class="text-xl text-black mt-1">
                    Pickup: <span class="text-gray-700 font-medium">Moka</span> <span class=" my-1 inline-block w-1.5 h-1.5 bg-black rounded-full mx-2"></span>
                    Return: <span class="text-gray-700 font-medium">...</span> 
                    
                </p>

            <!--Status bar-->
           <div class="absolute-right bg-gray-700 text-white w-28 text-center p-3 rounded-2xl">
                    On going
                </div>
                
            </div>
           </div>
        </div>
    </div>
</div>

        <!-- canceled example -->
       <!-- 1st entry-->
        <div class="glass-effect premium-shadow flex flex-col md:flex-row items-center rounded-2xl mx-6 md:mx-16 mb-6 md:mb-10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl border-yellow-400">
    
        <!-- Car Image -->
        <div class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 rounded-2xl overflow-hidden flex-shrink-0 w-full md:w-1/3 flex justify-center items-center">
            <img src="assets/911 turbo s.jpg" alt="Porsche 911" class="w-full h-full object-cover opacity-95 " />
        </div>

        <!-- Booking Details -->
        <div class="flex flex-col justify-center md:ms-8 mt-6 md:mt-0 w-full">
        
        <!-- Title + Booking ID -->
        <div class="mb-3">
            <h2 class="text-3xl md:text-4xl font-extrabold text-black luxury-font tracking-tight italic">Porsche 911 turbo</h2>
            <p class="text-sm text-black italic">Booking ID: <span class="text-grey-500 font-semibold">PMR-2025-0342</span></p>
        </div>

        <!-- Booking Info -->
        <div class="space-y-3 mt-2">
            <p class="text-lg md:text-2xl text-gray-800 font-semibold">
                <span class="text-grey-500">March 15 2025</span> - <span class="text-grey-500">March 21 2025</span> 
                <span class="text-gray-600 italic">(7 Days)</span>
            </p>

            <p class="text-lg md:text-2xl text-grey-500 font-bold flex items-center">
                Rs40k/day
                <span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mx-3"></span>
                <span class="text-yellow-600">Rs280k total</span>
            </p>
        </div>

        <!--Pickup detail-->
         <div class="mt-20 flex w-full pe-12 justify-between items-center ">
                 <p class="text-xl text-black mt-1">
                    Pickup: <span class="text-gray-700 font-medium">-</span> <span class=" my-1 inline-block w-1.5 h-1.5 bg-black rounded-full mx-2"></span>
                    Return: <span class="text-gray-700 font-medium">-</span> 
                    
                </p>

            <!--Status bar-->
           <div class="absolute-right bg-red-700 text-white w-28 text-center p-3 rounded-2xl">
                    canceled
                </div>
                
            </div>
           </div>
        </div>
    </div>
</div>
       
    <script src="Javascripts/homescript.js"></script>

</body>
</html>