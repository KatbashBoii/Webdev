<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    
    <xsl:template match="/">
        <html>
            <head>
                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <title>Prestige Motors - Response</title>
                
                <!--stylesheets -->
                <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&amp;family=Inter:wght@300;400;500&amp;display=swap" rel="stylesheet"/>
                <link href="https://cdn.tailwindcss.com" rel="stylesheet"/>
                <link href="stylesheets/homeStyles.css" rel="stylesheet"/>
                
                <!--improving response styling-->
                <style>
                    body {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        min-height: 100vh;
                        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
                        padding: 20px;
                    }
                    .response-card {
                        background: white;
                        border-radius: 16px;
                        padding: 40px;
                        max-width: 480px;
                        width: 100%;
                        text-align: center;
                        border-top: 4px solid #d4af37;
                        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
                    }
                    .response-icon {
                        width: 72px;
                        height: 72px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 24px;
                        font-size: 36px;
                        font-weight: bold;
                    }
                    .response-icon.success { background: #d1fae5; color: #059669; }
                    .response-icon.error { background: #fee2e2; color: #dc2626; }
                    .response-icon.warning { background: #fef3c7; color: #d97706; }
                    .back-btn {
                        margin-top: 24px;
                        display: inline-block;
                    }
                </style>
            </head>
            <body>
                <div class="response-card glass-effect premium-shadow">
                    
                    <!-- icon based on status -->
                    <div class="response-icon">
                        <xsl:attribute name="class">
                            response-icon
                            <xsl:choose>
                                <xsl:when test="response/status = 'success'">success</xsl:when>
                                <xsl:when test="response/status = 'error'">error</xsl:when>
                                <xsl:otherwise>warning</xsl:otherwise>
                            </xsl:choose>
                        </xsl:attribute>
                        <xsl:choose>
                            <xsl:when test="response/status = 'success'">✓</xsl:when>
                            <xsl:when test="response/status = 'error'">✕</xsl:when>
                            <xsl:otherwise>!</xsl:otherwise>
                        </xsl:choose>
                    </div>
                    
                    <!-- Title -->
                    <h2 class="luxury-font text-2xl font-bold text-gray-900 mb-4">
                        <xsl:choose>
                            <xsl:when test="response/status = 'success'">Message Sent</xsl:when>
                            <xsl:when test="response/status = 'error'">Error</xsl:when>
                            <xsl:otherwise>Notice</xsl:otherwise>
                        </xsl:choose>
                    </h2>
                    
                    <!-- Message content -->
                    <p class="text-gray-600 font-light text-lg mb-8">
                        <xsl:value-of select="response/message"/>
                    </p>
                 
                    <!-- Return button -->
                    <a href="homepage.php" class="back-btn">
                        <button class="text-white px-8 py-3 rounded-lg font-semibold tracking-wide uppercase">
                            Return to Home
                        </button>
                    </a>
                    
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>