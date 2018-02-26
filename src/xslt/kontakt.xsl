<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE;width:50%;margin:0 auto; text-align:center; border:1px solid #483d36">
        <b>Kontaktet Telefonike</b>
        <xsl:for-each select="kontakteTelefonike/kontakt">
            <div style="background-color:#483d36;color:white;padding:4px">
                <span style="font-weight:bold">
                    <xsl:value-of select="emerKontakti"/>
                </span>
            </div>
            <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
                <p>

                    <b>ID:</b>
                    <span>
                        <xsl:value-of select="kontaktId"/>
                    </span>
                    <br></br>
                    <b>Numri:</b>
                    <span>
                        <xsl:value-of select="numri"/>
                    </span>
                    <br></br>
                    <b>Tipi:</b>
                    <span>
                        <xsl:value-of select="tipi"/>
                    </span>
                    <br></br>
                    <b>Shteti:</b>
                    <span>
                        <xsl:value-of select="shteti"/>
                    </span>
                    <br></br>


                </p>
            </div>
        </xsl:for-each>
    </body>
</html>