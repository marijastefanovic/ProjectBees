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
        </style>
    </head>
    <body>
        <div style="display: flex;align-items: center;justify-content: center;" >
            <button><?= anchor("Neregistrovani/index", "PROJEKCIJE") ?></button>
            <button><?= anchor("Neregistrovani/premijere", "PREMIJERE") ?></button>
            
        </div>
        <hr>
        <div>
            <form name='pretraga' method="get" action="<?=site_url("$controller/pretraga") ?>" > <!-- PHP -->
                <input type="text" name="pretraga" placeholder="Search.." >
                <input name="trazi" type="submit" value="Pretrazi" >
                <!--
                <label for="zanr">Žanr:</label>
                    <select name="Zanr" id="zanr" size="2" multiple="true">
                        <option id="akcija"> akcija</option>
                        <option id="dokumentarni">dokumentarni</option>
                        <option id="drama">drama</option>
                        <option id="horor">horor</option>
                        <option id="komedija">komedija</option>
                        <option id="romaticni">romantični</option>
                        <option id="triler">triler</option>
                        <option id="fantazija">fantazija</option>
                    </select>
                -->
                    
                
                <!--    <select name="Datum" id="datum" size="1" >
                        <option>Ponedeljak</option>
                        <option>Utorak</option>
                        <option>Sreda</option>
                        <option>Četvrtak</option>
                        <option>Petak</option>
                        <option>Subota</option>
                        <option>Nedelja</option>
                    </select>
                
                    <input name="trazi" type="submit" value="Pretrazi" onclick="selectedElem()" >
                -->
                
            </form>
        </div>
        <hr>

    </body>
</html>