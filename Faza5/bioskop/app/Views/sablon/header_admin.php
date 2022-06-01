<!--Natalija Tosic 19/0346-->
<html>
    <head>
        <title>Bioskop</title>  
        <style>
          tr{border-top: 5px rgb(0, 0, 0)  solid;}  
          td{width: 30%;}
          table.film {width: 100%;  margin-left: auto; border-spacing: 20px;}
          table.film td.opis{width: 40%;}
          table.film td {width:25%}
          table.film td.poster {width:10%}
          
          a:link{
              text-decoration: none;
              color: blue;
            }
          a:visited{
            text-decoration: none;
          }
          aside{
              display:inline;
              float: left;
          }
          table.filmovi{
            width:60%;
            display: inline;
            float: left;
            border-spacing: 20px;
          }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function myFunction($id) {
              if(confirm("Da li ste sigurni da želite da obrišete projekciju?")==true){
                $.ajax({
                  type: 'POST',
                  url: "obrisi_projekciju/",
                  data: {id: $id}
                  //url: "${createLink(action:'obrisi_projekciju', controller:'Admin')}/" + $id
                });
              }
            }
            function prihvati($id){
              $.ajax({
                  type: 'POST',
                  url: "prihvati_zahtev/",
                  data: {id: $id}
                });
            }
            function odbij($id){
              $.ajax({
                  type: 'POST',
                  url: "odbij_zahtev/",
                  data: {id: $id}
                });
            }
            var termini;
            function izracunajtermine($id){
             $.ajax({
                type: 'POST',
                url: "pronadji_slobodne_termine/",
                data: {id: $id},
                success: function(response){
                  termini = JSON.parse(response);
                  //alert(response);
                  popuniSale();
                }
              });
            }
            function popuniSale(){
              var select = document.getElementById("sale");
              for(var i = 0; i < termini.length; i++) {
                var ter = termini[i]['sala']['Naziv'];
                var postoji=false;
                  for(var j=0;j<i;j++){
                    if(termini[i]['sala']['IdS']==termini[j]['sala']['IdS']){
                      postoji = true;
                    }
                  }
                  if(!postoji){
                  var el = document.createElement("option");
                  el.textContent = ter;
                  el.value = termini[i]['sala']['IdS'];
                  select.add(el,1);
                  }
              }
            }
            function popuniDane(){
              var e = document.getElementById("sale");
              var sala = e.options[e.selectedIndex].text;
              var el = document.createElement("option");
              var select = document.getElementById("dani");
              for(var i = 0; i < termini.length; i++) {
                var ter;
                switch(termini[i]['dan']){
                  case 0: ter ="Ponedeljak"; break;
                  case 1: ter = "Utorak"; break;
                  case 2: ter = "Sreda"; break;
                  case 3: ter = "Četvrtak"; break;
                  case 4: ter = "Petak"; break;
                  case 5: ter = "Subota"; break;
                  case 6: ter = "Nedelja"; break;
                }
                if(termini[i]['sala']['Naziv']==sala){
                  var postoji=false;
                  for(var j=0;j<i;j++){
                    if(termini[i]['sala']['IdS']==termini[j]['sala']['IdS']&&termini[i]['dan']==termini[j]['dan']){
                      postoji = true;
                    }
                  }
                  if(!postoji){
                  var el = document.createElement("option");
                  el.textContent = ter;
                  el.value = termini[i]['dan'];
                  select.appendChild(el);
                  }
                }
              }
            }
            function popuniSate(){
              var e = document.getElementById("dani");
              var dan = e.options[e.selectedIndex].value;
              console.log(dan);
              var select = document.getElementById("sati");
              var s = document.getElementById("sale");
              var sala = s.options[s.selectedIndex].text;
              for(var i = 0; i < termini.length; i++) {
                var ter = termini[i]['termin'];
                console.log(ter);
                var postoji = false;
                if(termini[i]['sala']['Naziv']==sala && termini[i]['dan']==dan){
                  for(var j =0; j<i;j++){
                  if(termini[i]['termin']==termini[j]['termin'] && termini[i]['sala']['Naziv']==termini[j]['sala']['Naziv'] && termini[i]['dan']==termini[j]['dan']){
                    postoji = true;
                  }
                }
                if(!postoji){
                  var el = document.createElement("option");
                  el.textContent = ter;
                  el.value = ter;
                  select.appendChild(el);
                }
                }
              }
            }
        </script>
    </head>
    <body>
        <table width = 100% cellspacing=0> 
        <tr>
          <td> <img src="<?php echo base_url('Slike/logo.jpeg'); ?> " width="90" height="40" alt='logo'></td>
          <td></td>
            <td align = right><?= anchor("$controller/logout", "log out")?></td>
            
        </tr> 
        <tr>
            <td colspan="3"> <hr></td>
        </tr>
        <tr>
            <td align = center><?= anchor("$controller/zahtevi", "Zahtevi")?></td>
            <td align = center><?= anchor("$controller/pravljenje_projekcija", "Pravljenje projekcija")?></td>
            <td align = center><?= anchor("$controller/brisanje_projekcija", "Brisanje projekcija")?></td>
        </tr>
        <tr>
            <td colspan="3"> <hr></td>
        </tr>
        </table>