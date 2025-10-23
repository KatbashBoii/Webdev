<?php include 'databaseconnect.php'; 

    $query1 = "SELECT * FROM cartable WHERE ID = 8";
    $result1 = $connection->query($query1);
    $car1 = $result1->fetch_assoc();

    $query2 = "SELECT * FROM cartable WHERE ID = 2";
    $result2 = $connection->query($query2);
    $car2 = $result2->fetch_assoc();

    $query3 = "SELECT * FROM cartable WHERE ID = 3";
    $result3 = $connection->query($query3);
    $car3 = $result3->fetch_assoc();

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

<body class="bg-white">
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

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white pt-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 relative z-10">
            <div class="text-center">
                <div class="luxury-text text-sm font-medium tracking-[0.3em] mb-4 uppercase">Exclusive Luxury Rentals</div>
                <h1 class="luxury-font text-5xl md:text-7xl font-bold mb-8 leading-tight">Experience <br><span class="luxury-text">Automotive </span><span class="luxury-text decoration-amber-400 decoration-2 ">Excellence</span></h1>
                <p class="text-xl md:text-2xl mb-12 opacity-90 max-w-3xl mx-auto font-light">Indulge in our curated collection of the world's finest vehicles. Where luxury meets performance, and every journey becomes extraordinary.</p>
            </div>
        </div>
    </section>

    <!-- Featured Cars -->
    <section id="cars">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <div class="luxury-text text-2xl mt-12 tracking-[0.3em] mb-4 uppercase">Curated Collection</div>
                <h2 class="luxury-font text-4xl md:text-7xl font-bold text-gray-900 mb-6">Exceptional Vehicles</h2>
                <div class="section-divider space-y-2 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">Each vehicle in our collection represents the pinnacle of automotive craftsmanship and engineering excellence</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-16 ">
                <!-- Car 1 -->
                <div class="car-card rounded-2xl overflow-hidden border-yellow-400">
                    <div class="h-64 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 flex items-center justify-center relative overflow-hidden">
                        <!--insert pic-->
                            <img src="assets/ID<?php echo $car1['ID']; ?>.jpg" class="absolute inset-0 w-full h-full object-cover z-0" />
                            <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wide z-10"><?php echo $car1['Type']; ?></div>
                        </div>
                    <div class="p-8">
                        <h3 class="luxury-font text-2xl font-semibold mb-3"><?php echo $car1['Name']; ?></h3>
                        <p class="text-gray-600 mb-6 font-light"><?php echo $car1['Description']; ?></p>
                        <div class="flex justify-between items-center mb-6">
                            <div class="text-3xl font-bold luxury-text">Rs<?php echo $car1['RentPerDay']; ?><span class="text-lg text-gray-500 font-normal">/day</span></div>
                        </div>
                        <a href="car.php?id=<?php echo $car1['ID']?>">
                        <button class="w-full luxury-button text-white py-3 rounded-lg font-semibold tracking-wide uppercase">
                            Reserve Now
                        </button>
                        </a>
                    </div>
                </div>

                <!-- Car 2 -->
                <div class="car-card rounded-2xl overflow-hidden border-yellow-400">
                    <div class="h-64 bg-gradient-to-br from-red-900 via-red-800 to-black flex items-center justify-center relative overflow-hidden">
                        <img src="assets/ID<?php echo $car2['ID']; ?>.jpg" class="absolute inset-0 w-full h-full object-cover z-0" />
                        <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wide"><?php echo $car2['Type']; ?></div>
                        <svg class="w-40 h-24 text-yellow-400/80" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                        </svg>
                    </div>
                    <div class="p-8">
                        <h3 class="luxury-font text-2xl font-semibold mb-3"><?php echo $car2['Name']; ?></h3>
                        <p class="text-gray-600 mb-6 font-light"><?php echo $car2['Description']; ?></p>
                        <div class="flex justify-between items-center mb-6">
                            <div class="text-3xl font-bold luxury-text">Rs<?php echo $car2['RentPerDay']; ?><span class="text-lg text-gray-500 font-normal">/day</span></div>
                        </div>
                        <a href="car.php?id=<?php echo $car2['ID']?>">
                        <button class="w-full luxury-button text-white py-3 rounded-lg font-semibold tracking-wide uppercase">
                            Reserve Now
                        </button>
                        </a>
                    </div>
                </div>

                <!-- Car 3 -->
                <div class="car-card rounded-2xl overflow-hidden border-yellow-400">
                    <div class="h-64 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 flex items-center justify-center relative overflow-hidden">
                        <img src="assets/ID<?php echo $car3['ID']; ?>.jpg"  class="absolute inset-0 w-full h-full object-cover z-0" />
                        <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wide"><?php echo $car3['Type']; ?></div>
                        <svg class="w-40 h-24 text-yellow-400/80" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                        </svg>
                    </div>
                    <div class="p-8">
                        <h3 class="luxury-font text-2xl font-semibold mb-3"><?php echo $car3['Name']; ?></h3>
                        <p class="text-gray-600 mb-6 font-light"><?php echo $car3['Description']; ?></p>
                        <div class="flex justify-between items-center mb-6">
                            <div class="text-3xl font-bold luxury-text">Rs<?php echo $car3['RentPerDay']; ?><span class="text-lg text-gray-500 font-normal">/day</span></div>
                        </div>
                        <a href="car.php?id=<?php echo $car3['ID']?>">
                        <button class="w-full luxury-button text-white py-3 rounded-lg font-semibold tracking-wide uppercase">
                            Reserve Now
                        </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="hero-gradient text-white p-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <div class="luxury-font text-white text-sm font-medium tracking-[0.3em] mb-4 uppercase">Unparalleled Service</div>
                <h2 class="luxury-font luxury-text text-4xl md:text-5xl font-bold text-white mb-6">The Prestige Difference</h2>
                <div class="section-divider w-32 mx-auto mb-6"></div>
                <p class="text-xl text-white max-w-3xl mx-auto font-light">We redefine luxury car rental through meticulous attention to detail, personalized service, and an unwavering commitment to excellence</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="feature-icon w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span ><img src="assets/icon/car-svgrepo-com.svg" alt="Check icon" width="50" height="50" ></span>
                    </div>
                    <h3 class="luxury-font luxury-text font-semibold mb-3">Exclusive Collection</h3>
                    <p class="text-white font-light leading-relaxed">Handpicked vehicles from the world's most prestigious manufacturers, maintained to perfection</p>
                </div>
                
                <div class="text-center group">
                    <div class="feature-icon w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span ><img src="assets/icon/premium-svgrepo-com.svg" alt="Check icon" width="50" height="50" ></span>
                    </div>
                    <h3 class="luxury-font luxury-text font-semibold mb-3">Bespoke Experience</h3>
                    <p class="text-white font-light leading-relaxed">Tailored service that anticipates your needs and exceeds your expectations at every touchpoint</p>
                </div>
                
                <div class="text-center group">
                    <div class="feature-icon w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span> <img src="assets/icon/location-pin-svgrepo-com.svg" alt="Check icon" width="50" height="50" > </span>
                    </div>
                    <h3 class="luxury-font luxury-text font-semibold mb-3">Instant Access</h3>
                    <p class="text-white font-light leading-relaxed">Seamless digital experience with white-glove delivery and pickup at your preferred location</p>
                </div>
                
                <div class="text-center group">
                    <div class="feature-icon w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span ><img src="assets/icon/security-2-svgrepo-com.svg" alt="Check icon" width="50" height="50" ></span>
                    </div>
                    <h3 class="luxury-font luxury-text font-semibold mb-3">Complete Protection</h3>
                    <p class="text-white font-light leading-relaxed">Comprehensive coverage and 24/7 concierge support for absolute peace of mind</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <div class="luxury-text text-sm font-medium tracking-[0.3em] mb-4 uppercase">Concierge Service</div>
                <h2 class="luxury-font text-4xl md:text-5xl font-bold text-gray-900 mb-6">Connect With Us</h2>
                <div class="section-divider w-32 mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">Our dedicated team is available 24/7 to assist with your luxury automotive needs</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="space-y-8">
                    <h3 class="luxury-font text-3xl font-semibold mb-8">How to Reach Us</h3>
                    <div class="space-y-6">
                        <div class="flex items-start group">
                            <div class="feature-icon w-12 h-12 rounded-full flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                <span ><img src="assets/icon/phone-svgrepo-com.svg" alt="Check icon" width="24" height="24"></span> <!--added phone icon-->
                            </div>
                            <div>
                                <p class="font-semibold text-lg mb-1">Concierge Hotline</p>
                                <p class="text-gray-600 font-light">+230 5123 4567</p>
                                <p class="text-sm text-gray-500 mt-1">Available 24/7 for immediate assistance</p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="feature-icon w-12 h-12 rounded-full flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                <span><img src="assets/icon/email-svgrepo-com.svg" alt="Check icon" width="24" height="24"></span><!--added email icon-->
                            </div>
                            <div>
                                <p class="font-semibold text-lg mb-1">Private Email</p>
                                <p class="text-gray-600 font-light">concierge@prestigemotors.com</p>
                                <p class="text-sm text-gray-500 mt-1">Response within 2 hours guaranteed</p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="feature-icon w-12 h-12 rounded-full flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                <span ><img src="assets/icon/car-placeholder-svgrepo-com.svg" alt="Check icon" width="24" height="24"></span><!--added location icon-->
                            </div>
                            <div>
                                <p class="font-semibold text-lg mb-1">Flagship Showroom</p>
                                <p class="text-gray-600 font-light">University Of Mauritius<br>Reduit, Mauritius, 80837</p>
                                <p class="text-sm text-gray-500 mt-1">By appointment only</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="glass-effect rounded-2xl premium-shadow p-8">
                    <h3 class="luxury-font text-2xl font-semibold mb-6 text-center">Send Us a Message</h3>
                    <form id="contact-form" class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 tracking-wide uppercase">Full Name</label>
                            <input type="text" class="w-full p-4 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-white/90 font-medium" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 tracking-wide uppercase">Email Address</label>
                            <input type="email" class="w-full p-4 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-white/90 font-medium" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-3 tracking-wide uppercase">Your Message</label>
                            <textarea rows="5" class="w-full p-4 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-white/90 font-medium resize-none" placeholder="Tell us about your luxury automotive needs..." required></textarea>
                        </div>
                        <button type="submit" class="w-full luxury-button text-white py-4 rounded-lg font-semibold tracking-wide uppercase">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
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

                        <a href="https://www.facebook.com" class="feature-icon w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300"> <!--tailwind code to make a circle of radius 5, golden and hover opt-->
                            <img src="assets/icon/facebook-svgrepo-com.svg" alt="Facebook" width="20" height="20">  <!--Facebook icon from svg-->
                        </a>

                        <a href="https://www.instagram.com"class="feature-icon w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300">
                            <img src="assets/icon/instagram-svgrepo-com.svg" alt="Instagram" width="20" height="20" class="text-gray-400"><!--Insta icon from svg-->
                        </a>

                        <a href="https://www.tiktok.com/en" class="feature-icon w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition-all duration-300">
                            <img src="assets/icon/tiktok-svgrepo-com.svg" alt="Tiktok" width="20" height="20" class="text-gray-400"></a><!--Tiktok icon from svg-->
                    </div>
                </div>

                <!--Same nav bar as main, but vertical/ gold hover effect-->
                <div>
                    <h4 class="luxury-font text-xl font-semibold mb-6 luxury-text">Navigation</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="homepage.php" class="hover:text-yellow-400 transition-colors duration-300 font-light">Home</a></li>
                        <li><a href="carlist.php" class="hover:text-yellow-400 transition-colors duration-300 font-light">Collection</a></li>

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

    <script src="Javascripts/homescript.js"></script>
</body>
</html>