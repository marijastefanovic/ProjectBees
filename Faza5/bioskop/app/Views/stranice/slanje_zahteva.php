<!--Ana Stanic 0703/19-->

    
<form name="slanjeZahteva" style="text-align:center" action="<?= site_url("Predstavnik/posaljiZahtev") ?>" method="post">
        <div class = "center" height = "30%" >
            <p><strong>
                <h style = "font-size: 180%;">ZAHTEV:</h>
            </strong></p>          
        </div>
        <div style="text-align:center" >
            <label> Naziv filma:</label><br>
            <input type="text" name="Naziv">
        </div>
        <br>
        
        <div class = "center" >
            <label> Kratak opis filma:</label><br>
            <input type="text" name="Opis" id="Opis">
        </div>
        <br>
        <div class = "center">
            <label for="zanr">Zanr:</label>
                    <select name="Zanr" id="zanr" size="1" >
                        <option id="akcija" name="akcija"> akcija</option>
                        <option id="dokumentarni" name="dokumentarni">dokumentarni</option>
                        <option id="drama" name="drama">drama</option>
                        <option id="horor" name="horor">horor</option>
                        <option id="komedija" name="komedija">komedija</option>
                        <option id="romaticni" name="romanticni">romanticni</option>
                        <option id="triler" name="triler">triler</option>
                        <option id="fantazija" name="fantazija">fantazija</option>
                    </select>
        </div>
        <br>
        <div class = "center">
            <label> Trajanje filma:</label><br>
            <input type="text" name="Trajanje filma">
        </div>
        <br>
        <div class = "center">
            <label>Glumci:</label><br>
            <input type="text" name="Glumci">
        </div>
        <br>
        <div class = "center">
            <label>Reziseri:</label><br>
            <input type="text" name="Reziseri">
        </div>
        <br>
        <div class = "novidiv">
            <label>Poster filma:</label><br>
            <input type="file" name="Poster filma" enctype="multipart/form-data">
            
        </div>
        <br>
        <div class="novidiv">
            <label>Trejler filma:</label><br>
            <input class = "center" type="file" name="Trejler filma">
        </div>

        <br>
        <br>
        <div class = "center" >
            <input type="submit" name="Posalji Zahtev" value="Posalji Zahtev"/>
        </div>
    </form>
</body>
</html>