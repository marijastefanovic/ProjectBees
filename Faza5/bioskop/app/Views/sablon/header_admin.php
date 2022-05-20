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
              width: 40%;
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
        <script>
            function myFunction() {
              confirm("Da li ste sigurni da želite da obrišete projekciju?");
            }
        </script>
    </head>
    <body>
        <table width = 100% cellspacing=0> 
        <tr>
            <td> <img src="slike/logo.jpeg" alt="logo" width = 90 height = 40 ></td>
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