<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

<html lang="en">

<head>

<title>Prestige Motors - Luxury Car Rental</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>

<link href="stylesheets/homeStyles.css" rel="stylesheet"/>

</head>

<body class="bg-white">

<!-- Navigation -->
<nav class="nav-luxury fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

        <div class="text-3xl font-bold luxury-font luxury-text">
            ✦ Prestige Motors
        </div>

        <div class="flex space-x-8">
            <a href="homepage.php" class="text-white hover:text-yellow-400">HOME</a>
            <a href="carlist.php" class="text-white hover:text-yellow-400">COLLECTION</a>
        </div>

        </div>
    </div>
</nav>

<!-- Car Section -->

<div class="flex mt-20 mb-20 min-h-[calc(100vh-5rem)]">

<!-- Image side -->
<div class="w-1/2 relative">

<img class="absolute inset-0 w-full h-full object-cover">

<xsl:attribute name="src">
<xsl:value-of select="PrestigeMotors/Car/Image"/>
</xsl:attribute>

</img>

<div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs">

<xsl:value-of select="PrestigeMotors/Car/Type"/>

</div>

</div>

<!-- Details side -->
<div class="w-1/2 p-8 flex flex-col justify-center">

<h3 class="luxury-font text-2xl font-semibold mb-3">

<xsl:value-of select="PrestigeMotors/Car/Name"/>

</h3>

<p class="text-gray-600 mb-6 font-light">

<xsl:value-of select="PrestigeMotors/Car/Description"/>

</p>

<p class="text-gray-600 mb-6 font-light">

<xsl:value-of select="PrestigeMotors/Car/LongDescription"/>

</p>

<div class="text-3xl font-bold text-amber-400">

Rs<xsl:value-of select="PrestigeMotors/Car/Pricing/RentPerDay"/>

<span class="text-lg text-gray-500 font-normal">/day</span>

</div>

</div>

</div>

</body>

</html>

</xsl:template>

</xsl:stylesheet>