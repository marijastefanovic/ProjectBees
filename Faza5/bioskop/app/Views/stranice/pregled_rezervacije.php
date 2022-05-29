<!--Marija Stefanovic 2019/0068-->
<html lang="en">
<head>
   <script>
       function nastaviPretragu(){
           window.location.href="pocetna.html"
       }

   </script>
</head>
<body>
    <div>
        <table width  = 100% >
            <tr>
                <td><img src="slike/logo.jpg" alt="logo" height = 150 ></td>
                <td></td>
                <td align = right><a href="login.html">log in</a>/<a href="registracija.html">registracija</a></td>
            </tr>
        </table>
        <hr>
   </div>
   
    <div  >
       
        <table width="85%"  style="text-align: center;" cellspacing="15px" >
            <tr style="font-size: larger;">
                <td rowspan="2"  style="text-align: left;"><img src="<?php  ?>" alt="" style="height: 250px; width: 150px;"></td>
                <td>Naziv filma:</td>
                <td>Datum i vreme projekcije:</td>
                <td>Sala:</td>
                
            </tr>
            <tr style="font-size: x-large;">
               <?php
                   // var_dump($projekcija);
                    echo "<td>{$projekcija[0]} </td>";
                    echo "<td>{$projekcija[1]}</td>";
                    echo "<td>{$projekcija[2]}</td>";

               
               ?>
                
                
            </tr>
        </table>
        
            <br><br><br>

       
    </div>
    <div align="center" style="padding-left: 90px;">
        <button align="center" onclick="nastaviPretragu()">Nastavi pretragu</button>
    </div>
</body>
</html>