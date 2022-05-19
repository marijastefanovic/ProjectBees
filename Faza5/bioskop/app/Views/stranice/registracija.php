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
            <input type="text" id="Ime" >

        </div>
        <div>
            <label> Prezime: </label><br>
            <input type="text" id="Prezime">

        </div>
        <div>
            <label> Mejl Adresa: </label><br>
            <input type="text" id="Mejl Adresa">

        </div>
        <div>
            <label> Lozinka: </label><br>
            <input type="text" id="Lozinka">

        </div>
        <div>
            <label> Molimo potvrdite lozinku: </label><br>
            <input type="text" id="Molimo potvrdite lozinku">

        </div>
        <div><p>
            <a href = "pocetna.html"> <button onclick="registrujMe(); type=button">Registruj me kao korisnika!</button> </a>
            
            
        </p></div>
        <div> 
            <p>
                <h style = "font-size: 150%;" >*Ukoliko zelite da se registrujete kao predstavnik filma: </h>         
             </p> 
             <label> Naziv Vase kompanije:</label><br>
            <input type="text" id="Naziv Vase kompanije">

        </div>
        <div><p><a href = "login.html">  <button onclick="registrujMe()" type= button">Registruj me kao predstavnika filma!</button></a></div>
           
           
    
    </body>  
    
    
 </html>