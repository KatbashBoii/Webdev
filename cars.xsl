<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="html" indent="yes" encoding="UTF-8" omit-xml-declaration="yes"/>

  <!-- Match root Cars element -->
  <xsl:template match="/Cars">
    <xsl:for-each select="Car">
      <div class="car-card rounded-2xl overflow-hidden border-yellow-400 flex flex-col">
        
        <!-- Car Image Section -->
        <div class="h-80 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 flex items-center justify-center relative">
          <img src="{Image}" class="absolute inset-0 w-full h-full object-cover z-0" alt="{Name}" />
          <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wide">
            <xsl:value-of select="Type"/>
          </div>
        </div>
        
        <!-- Car Details Section -->
        <div class="p-8 flex flex-col flex-1">
          <h3 class="luxury-font text-2xl font-semibold mb-3">
            <xsl:value-of select="Name"/>
          </h3>
          <p>
            <xsl:value-of select="Description"/>
          </p>
          
          <!-- Price & Button -->
          <div class="flex justify-between items-center mb-6 mt-auto">
            <div class="text-3xl font-bold text-amber-400">
              RS <xsl:value-of select="RentPerDay"/>
              <span class="text-lg text-gray-500 font-normal">/day</span>
            </div>
          </div>
          
          <a href="car.php?id={ID}">
            <button class="w-full luxury-button text-white py-3 rounded-lg font-semibold tracking-wide uppercase">
              Reserve Now
            </button>
          </a>
        </div>
        
      </div>
    </xsl:for-each>
  </xsl:template>

</xsl:stylesheet>