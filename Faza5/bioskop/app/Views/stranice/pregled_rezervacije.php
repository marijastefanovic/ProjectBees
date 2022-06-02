<!--Marija Stefanovic 2019/0068-->
<html lang="en">
<head>
   <script>
       function nastaviPretragu(){
           window.location.href="pocetna.html"
       }

   </script>
   <style>
       #slika1{
           height: 250px;
           width: 150px;
       }
   </style>
</head>
<body>
    
   
    <div  >
       
        <table width="85%"  style="text-align: center;" cellspacing="15px" >
            <tr style="font-size: larger;">
                <td rowspan="2"  style="text-align: left;">
                    <?php echo "<img id='slika1' src='data:image/jpeg;base64,".base64_encode($projekcija[3])."'>"; ?>
                        
                </td>
                <td>Naziv filma:</td>
                <td>Datum i vreme projekcije:</td>
                <td>Sala:</td>
                
            </tr>
            <tr style="font-size: x-large;">
               <?php
                   
                    echo "<td>{$projekcija[0]} </td>";
                    echo "<td>{$projekcija[1]}</td>";
                    echo "<td>{$projekcija[2]}</td>";

               
               ?>
                
                
            </tr>
        </table>
        
            <br><br><br>

       
    </div>
    <div align="center" style="padding-left: 90px;">
    <form name="nastavipretragu" action="<?= site_url("Gledalac/pocetna") ?>" method="post">
        <input type="submit" value="Nastavi pretragu">
       
    </form>
    </div>
</body>
</html>