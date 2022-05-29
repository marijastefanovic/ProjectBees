<!--Marija Stefanovic 2019/0068-->
<html>
    <head>
        <title> Bioskop </title>
        <script>
            
        </script>
        <style> body {
            margin: 0;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 18px;
            color: #000;
            background-color: #fff;

            
        }
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
        td#logreg{
            text-align: right;
        }
        </style>
    </head>
    <body>  
        <table width = 100%>
            <tr>
            
                <td>
                <img src='slike/logo.jpeg' width="90" height="40"> 
                </td> 
                <td></td>
                <td id="logreg"><?= anchor("$controller/login", "log in")?>/<?=anchor("$controller/registracija", "registracija")?></td>
            </tr>
        </table>
        <hr>
        
    </body>
