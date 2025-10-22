<?php include 'databaseconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Motors - Luxury Car Rental Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="../stylesheets/homeStyles.css" rel="stylesheet">


</head>

<body class="bg-gray-400">
    <!-- Navigation -->
    <nav class="nav-luxury fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="../brochomepage.html">
                        <button class="focus:outline-none">
                            <div class="text-3xl font-bold luxury-font luxury-text">✦ Prestige Motors</div>
                        </button>
                    </a>
                </div>

               
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="brochomepage.html" class="text-white hover:text-yellow-400 px-3 py-2 text-sm font-medium tracking-wide transition-colors duration-300">HOME</a>
                        <a href="vehiclelist.html" class="text-white hover:text-yellow-400 px-3 py-2 text-sm font-medium tracking-wide transition-colors duration-300">COLLECTION</a>
                        <a href="#services" class="text-white hover:text-yellow-400 px-3 py-2 text-sm font-medium tracking-wide transition-colors duration-300">SERVICES</a>
                        <a href="#contact" class="text-white hover:text-yellow-400 px-3 py-2 text-sm font-medium tracking-wide transition-colors duration-300">CONTACT</a>
                        <a href="../registry.html"><button class="luxury-button text-white px-6 py-2 text-sm font-medium tracking-wide">MEMBER ACCESS</button></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


<!--Search Bar-->
<div class="bg-white-300 object-top-left p-4 mt-24">

        <form id="SearchBar" class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <div class="text-left">
                <input type="text" placeholder="Vehicle" class="w-full h-14 p-4 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-white/90 font-medium text-black font-bold">
            </div>

            <div class="text-left">
                <input type="number" placeholder="Number of Seats"  min="2" max="7" class="w-full h-14 p-4 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-white/90 font-medium text-black font-bold">
            </div>

            <div class="text-left">
                <select class="w-full h-14 p-4 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-white/90 font-medium text-black font-bold ">
                    <option class="text-gray-600 mb-6 font-light">Any</option>
                    <option class="text-gray-600 mb-6 font-light">Sports Car</option>
                    <option class="text-gray-600 mb-6 font-light">SUV</option>
                    <option class="text-gray-600 mb-6 font-light">Premium</option>
                    <option class="text-gray-600 mb-6 font-light">hatchback</option>
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full luxury-button text-white h-14 p-4 rounded-lg font-semibold tracking-wide uppercase">
                    Discover Vehicles
                </button>
            </div>

        </form>
    </div>
    
    <section id="cars" class="bg-white-300 p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-50 px-2">
    <!--INSERTING IN TO DATA BASE-->
            <?php
              $sql = "SELECT * FROM cartable";
              $result = $connection->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    echo '<div class="car-card rounded-2xl overflow-hidden border-yellow-400 flex flex-col">
                    <div class="h-64 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 flex items-center justify-center relative">
                     <img src="../assets/'. htmlspecialchars($row["Name"]).'.jpg" class="absolute inset-0 w-full h-full object-cover z-0" />
                        <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wide">'. htmlspecialchars($row["Type"]) .'</div>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="luxury-font text-2xl font-semibold mb-3">'. htmlspecialchars($row["Name"]) .'</h3>
                        <p>'. htmlspecialchars($row["Description"]) .'</p>
                        <div class="flex justify-between items-center mb-6 mt-auto">
                            <div class="text-3xl font-bold text-amber-400 ">RS '. htmlspecialchars($row["RentPerDay"]) .'<span class="text-lg text-gray-500 font-normal">/day</span></div>
                        </div>
                        <a href="car.php?' . http_build_query(['id' => $row['ID']]) . '">
                        <button class="w-full luxury-button text-white py-3 rounded-lg font-semibold tracking-wide uppercase">
                            Reserve Now
                        </button>
                        </a>
                    </div>
                </div>';
                }
              }
            ?>   
    </section>

   <!-- Footer -->
    <footer class="bg-black text-white py-16 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-black to-gray-900"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="luxury-font text-3xl font-bold luxury-text mb-6">✦ Prestige Motors</div>
                    <p class="text-gray-300 font-light text-lg leading-relaxed mb-6">Redefining luxury automotive experiences through uncompromising quality, exceptional service, and an unwavering commitment to excellence.</p>
                    <div class="flex space-x-6">

                        <a href="#" class="feature-icon w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300"> <!--tailwind code to make a circle of radius 5, golden and hover opt-->
                            <img src="assets/icon/facebook-svgrepo-com.svg" alt="Facebook" width="20" height="20">  <!--Facebook icon from svg-->
                        </a>

                        <a href="#"class="feature-icon w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300">
                            <img src="assets/icon/instagram-svgrepo-com.svg" alt="Instagram" width="20" height="20" class="text-gray-400"><!--Insta icon from svg-->
                        </a>

                        <a href="#" class="feature-icon w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300">
                            <img src="assets/icon/tiktok-svgrepo-com.svg" alt="Tiktok" width="20" height="20" class="text-gray-400"></a><!--Tiktok icon from svg-->
                    </div>
                </div>

                <!--Same nav bar as main, but vertical/ gold hover effect-->
                <div>
                    <h4 class="luxury-font text-xl font-semibold mb-6 luxury-text">Navigation</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="#home" class="hover:text-yellow-400 transition-colors duration-300 font-light">Home</a></li>
                        <li><a href="#cars" class="hover:text-yellow-400 transition-colors duration-300 font-light">Collection</a></li>
                        <li><a href="#services" class="hover:text-yellow-400 transition-colors duration-300 font-light">Services</a></li>
                        <li><a href="#contact" class="hover:text-yellow-400 transition-colors duration-300 font-light">Contact</a></li>
                    </ul>
                </div>


                <div>
                    <h4 class="luxury-font text-xl font-semibold mb-6 luxury-text">Exclusive Services</h4>
                    <ul class="space-y-3 text-gray-300 font-light">
                        <li>Luxury Vehicle Rentals</li>
                        <li>Chauffeur Services</li>
                        <li>Corporate Packages</li>
                        <li>Event Transportation</li>
                        <li>Concierge Support</li>
                    </ul>
                </div>
            </div>

            <!--gold line effect-->
            <div class="section-divider mt-12 mb-8"></div>


            <div class="text-center text-gray-400 font-light">
                <p>&copy; 2025 Prestige Motors. All rights reserved. | <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Privacy Policy</a> | <a href="#" class="hover:text-yellow-400 transition-colors duration-300">Terms of Service</a></p>
            </div>
        </div>

    </footer>

    <script src="/Javascripts/homescript.js"></script>
</body>
</html>