<!--Anja Negic 676/19-->
<div style="display: flex; align-items: center; justify-content: center;" >
            <button class="btn btn-outline-dark" id="dugme"><?= anchor("$controller/pocetna", "PROJEKCIJE") ?></button>
            <button class="btn btn-outline-dark"><?= anchor("$controller/premijere", "PREMIJERE") ?></button>
            
        </div>
        <hr>
        <div>
            <form name='pretraga' method="post" action="<?=site_url("$controller/$stranica/pretraga") ?>" > 
               
                
                
                <label for="zanr"><b>Žanr:</b></label>
                    <select name="zanr" id="zanr" size="1">
                        <option id="izaberite" value='NULL'>Izaberite:</option>
                        <option id="akcija" value="Akcija"> Akcija</option>
                        <option id="avantura" value="Avantura"> Avantura</option>
                        <option id="dokumentarni" value="Dokumentarni">Dokumentarni</option>
                        <option id="drama" value="Drama">Drama</option>
                        <option id="horor" value="Horor">Horor</option>
                        <option id="komedija" value="Komedija">Komedija</option>
                        <option id="romaticni" value="Romantici">Romantični</option>
                        <option id="triler" value="Triler">Triler</option>
                        <option id="fantastika" value="Fantastika">Fantastika</option>
                    </select>
                
                    <?php $dan = array (strtotime("now"),strtotime("tomorrow"), strtotime("+2 days"), strtotime("+3 days"), strtotime("+4 days"));
                
                        echo "<select name='datum' id='datum' size='1' >
                            <option value='".NULL."'>Izaberite datum:</option>
                            <option value='".$dan[0]."'>".date('l d.m. ', $dan[0])." </option>
                            <option value='".$dan[1]."'>".date('l d.m. ', $dan[1])." </option>
                            <option value='".$dan[2]."'>".date('l d.m. ', $dan[2])." </option>
                            <option value='".$dan[3]."'>".date('l d.m. ', $dan[3])." </option>
                            <option value='".$dan[4]."'>".date('l d.m. ', $dan[4])." </option>
                        </select>";
                    ?>
                    <input type="text" id="pretraga" name="pretraga" placeholder="Search.." >

                    <input name="trazi" type="submit" value="Pretrazi" >
                
                
            </form>
        </div>
        <hr>
        <script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        </script>