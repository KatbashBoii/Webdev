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

    $ID = $user['id'];

    $stmt = $connection->prepare("SELECT * FROM customertable WHERE ID = ? ");
    $stmt->bind_param("i", $ID);
    $stmt->execute();

    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();

    $stmt->close();
    $connection->close();


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

    <!--user dashboard-->
    <section class="bg-white-400 flex flex-col h-full w-full items-center mt-12 p-20 ">
         <div class="h-full glass-effect rounded-2xl premium-shadow p-8 max-w-2xl mx-auto mb-12 border-yellow-400 overflow-hidden ">
            <div class="text-4xl font-bold luxury-font text-center luxury-text w-full mb-3">HELLO, <?php echo $customer['Fname'] ?> !</div>

    <div class="grid grid-cols-[1fr_auto] gap-x-6 gap-y-4 max-w-2xl mt-12">
    <!-- First Name -->
    <input id="firstnameField" type="text" value="<?php echo $customer['Fname'] ?>" readonly 
           class="border border-gray-300 rounded-lg px-4 py-2 text-black
              focus:outline-none focus:ring-2 focus:ring-yellow-500 
              bg-gray-100 w-full placeholder:text-gray-400">
    <button id="editfirstname" 
            class="luxury-button text-white px-5 py-2 text-sm font-medium tracking-wide rounded-lg w-28">
        Edit
    </button>

    <!-- Last Name -->
    <input id="lastnameField" type="text" value="<?php echo $customer['Lname'] ?>" readonly 
           class="border border-gray-300 rounded-lg px-4 py-2 text-black 
                  focus:outline-none focus:ring-2 focus:ring-yellow-500 
                  bg-gray-100 w-full">
    <button id="editlastname" 
            class="luxury-button text-white px-5 py-2 text-sm font-medium tracking-wide rounded-lg w-28">
        Edit
    </button>

    <!-- Email -->
    <input id="emailField" type="text" value="<?php echo $customer['Email'] ?>" readonly 
           class="border border-gray-300 rounded-lg px-4 py-2 text-black 
                  focus:outline-none focus:ring-2 focus:ring-yellow-500 
                  bg-gray-100 w-full">
    <button id="editEmail" 
            class="luxury-button text-white px-5 py-2 text-sm font-medium tracking-wide rounded-lg w-28">
        Edit
    </button>

    <!-- Phone -->
    <input id="phoneField" type="text" value="<?php echo $customer['Phone'] ?>" readonly 
           class="border border-gray-300 rounded-lg px-4 py-2 text-black
                  focus:outline-none focus:ring-2 focus:ring-yellow-500 
                  bg-gray-100 w-full">
    <button id="editPhone" 
            class="luxury-button text-white px-5 py-2 text-sm font-medium tracking-wide rounded-lg w-28">
        Edit
    </button>
</div>


            <div class="items-center justify-center flex flex-col gap-2 mt-6">
            <a href="historypage.php"><button class="luxury-button text-white p-2 text-sm font-medium tracking-wide rounded-lg w-full">View History</button></a>
            <a href="cookiereset.php"><button class="luxury-button text-white p-2 text-sm font-medium tracking-wide rounded-lg w-full">Log out</button></a>
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

</body>

<script>
    document.querySelectorAll("[id^='edit']").forEach(button => {
        button.addEventListener('click', function () {
            const fieldId = this.id.replace("edit", "").toLowerCase() + "Field";
            const field = document.getElementById(fieldId);
            const fieldMap = {
                'firstnamefield': 'firstname',
                'lastnamefield': 'lastname', 
                'emailfield': 'email',
                'phonefield': 'phone'
            };

            if (field.readOnly) {
                // Make editable
                field.readOnly = false;
                field.classList.remove('text-gray-400', 'bg-gray-100');
                field.classList.add('text-black', 'bg-white');
                this.textContent = "Save";
            } else {
                // Save to database
                const newValue = field.value;
                const fieldName = fieldId.replace("Field", "");

                fetch("updateuser.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `field=${fieldName}&value=${encodeURIComponent(newValue)}`
                })
                .then(res => res.text())
                .then(data => {
                    alert(data);
                    field.readOnly = true;
                    field.classList.add('text-gray-400', 'bg-gray-100');
                    field.classList.remove('text-black', 'bg-white');
                    this.textContent = "Edit";
                })
                .catch(err => console.error(err));
            }
        });
    });
</script>

</html>