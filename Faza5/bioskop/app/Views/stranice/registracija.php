<!--Ana Stanic 0703/19-->
<html>
    
    <head>
        <title> Registracija korisnika </title>        
        <script>
            function registrujMe(){
                
                document.getElementById("Ime").value=" ";
                document.getElementById("Prezime").value=" ";
                document.getElementById("Mejl Adresa").value=" ";
                document.getElementById("Naziv Vase kompanije").value=" ";
                document.getElementById("Lozinka").value=" ";
                document.getElementById("Molimo potvrdite lozinku").value=" ";
            }
        </script> 
        <style> body {
            margin: 0;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 18px;
            color: #000;
            background-color: #fff;
        }
        </style>    
    </head>

    <body>   
        <form name="registracijaForma" action="<?= site_url("Neregistrovani/registruj") ?>" method="post">
        <div height = "30%">
            <p><strong>
                <h style = "font-size: 180%;">Registracija</h>
            </strong></p>
        <p>
            <h style = "font-size: 150%;" >OBAVEZNA POLJA: </h>    
         </p>            
        </div>
        <div>
            <label> Ime: </label><br>
            <input type="text" id="Ime" name="Ime" >

        </div>
        <div>
            <label> Prezime: </label><br>
            <input type="text" id="Prezime" name="Prezime">

        </div>
        <div>
            <label> Mejl Adresa: </label><br>
            <input type="text" id="Mejl Adresa" name="MejlAdresa">

        </div>
        <div>
            <label> Lozinka: </label><br>
            <input type="text" id="Lozinka" name="Lozinka">

        </div>
        <div>
            <label> Molimo potvrdite lozinku: </label><br>
            <input type="text" id="Molimo potvrdite lozinku" name="Molimo potvrdite lozinku">

        </div>
        <div><p>
           <input type="submit" name="Registracija" value="Registracija"/>
            
            
        </p></div>
        <div> 
            <p>
            <h style = "font-size: 150%;" >*Ukoliko zelite da se registrujete kao predstavnik filma: </h>         
            </p> 
             <label> Naziv Vase kompanije:</label><br>
             <input type="text" id="Kompanija" name="Kompanija">
            

        </div>
        <div>  <input type="submit" name="Registracija2" value="Registracija2"/></div>
           
        </form>
    
    </body>  
    
    
 </html>