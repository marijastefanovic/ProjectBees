<!--ANJANEGIC-->

<html>
    <head>
        <title> Bioskop </title>
        <script>
            function selectedElem(){
                if(document.getElementById("akcija").selected==true){
                    window.location.assign("pocetna.html");
                }else{
                    window.location.assign("greska.html");
                }
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
        </style>
    </head>
    <body>
        
        <table>
            <tr>
                <td>
                    <div style="align-items:center; display: flex;">
                        <img src="slike/batman.jpeg">
                        <span style="margin-left:2ch"> <h2>BATMAN</h2> </br>
                            <table>
                                <tr>
                                    <td> 25.04.2022. </br>Sala 1 </br><a href="film1.html"><Button>Ponedeljak 12:00</Button></a></td>
                                    <!--<td>Sala 2 </br><Button>Utorak 12:00</Button></td>
                                    <td>Sala 3 </br><Button>Sreda 12:00</Button></td>
                                </tr>
                                <tr>
                                    <td>Sala 1 </br><Button>Ponedeljak 15:00</Button></td>
                                    <td>Sala 2 </br><Button>Utorak 15:00</Button></td>
                                    <td>Sala 3 </br><Button>Sreda 15:00</Button></td>
                                </tr>-->

                            </table>
                           
                        </span>
                    </div>
                
                </td>
                
            </tr>
            <tr>
                <td>
                    <div style="align-items:center; display: flex;">
                        <img src="slike/uncharted.jpeg">
                        <span style="margin:2ch"> <h2>UNCHARTED</h2> </br>
                            <table>
                                <tr>
                                    <td>  25.04.2022. </br> Sala 1 </br><a href="film2.html"><Button>Utorak 12:00</Button></a></td>
                                    <!--<td>Sala 2 </br><Button>Utorak 12:00</Button></td>
                                    <td>Sala 3 </br><Button>Sreda 12:00</Button></td>
                                </tr>
                                <tr>
                                    <td>Sala 1 </br><Button>Ponedeljak 15:00</Button></td>
                                    <td>Sala 2 </br><Button>Utorak 15:00</Button></td>
                                    <td>Sala 3 </br><Button>Sreda 15:00</Button></td>
                                </tr>-->

                            </table>
                           
                        </span>
                    </div>
                
                </td>
            </tr>
        </table>
        
        
    </body>
</html>