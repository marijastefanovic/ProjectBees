<!--Ana Stanic 0703/19-->
<html>
<head>

    <title>Pregled poslatih zahteva za prikaz filma</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div style=" float:left">
        <img src="slike/psi logo.jpeg" alt="Logo Bioskopa" height="21%">           
    </div>  

    <a href="registracija.html">  <div style="float:right"><p>registracija</div> </a>
        <a href = "login.html"> <div style="float:right"><p>log in/</div> </a>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href = "slanje_zahteva_za_prikaz_filma.html"> <div style="float:right"><p><button type="button">POSALJI ZAHTEV</button></div> </a>

    <hr style = "display:block;
    width:100%;
    visibility: visible ">  

<div height = "30%">
    <p><strong>
        <h style = "font-size: 180%;">Pregled zahteva:</h>
    </strong></p>          
</div>


<?php
foreach($zahtevi as $zahtev){

    echo  "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Naziv filma</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->naziv} </h>";

    echo  "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Opis filma</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->opis} </h>";

    echo  "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Zanr</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->zanr} </h>";

    echo   "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Trajanje filma</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->Trajanje} </h>";

    echo   "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Imena glumaca</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->Glumci} </h>";

    echo   "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Imena rezisera</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->Reziseri} </h>";

    echo   "<h style = 'font-size: 110%; color:grey; text-decoration: underline;'>Jezik</h>";
    echo "<h style = 'font-size: 110%;'> {$zahtev->jezik} </h>";

       
/*

    <h style = "font-size: 110%; color:grey; text-decoration: underline;">Poster filma</h>
    <h style = "font-size: 110%;">: </h>
  
    <div>
        <img src="slike/BETMEN.jpg" alt="Poster filma Betmen" height="40%">         
    </div>  

</div>

<div> 
<p >
    <h style = "font-size: 110%; color:grey; text-decoration: underline;">Trejler filma</h>
    <h style = "font-size: 110%;">:</h>
    <br>
    <video width="400" controls>
        <source src="slike/BETMEN _ Službeni trejler _ 2021.mp4" type="video/mp4">
      </video>
</p>
</div>
<div>
    <p>
        <h style = "font-size: 110%; color:grey; text-decoration: underline;">Status</h>
        <h style = "font-size: 110%;">: PRIHVACEN </h>
    </p>
    <hr style = "display:block;
    width:100%;
    visibility: visible ">  

    </div> */
}

?>




        

</body>
</html>