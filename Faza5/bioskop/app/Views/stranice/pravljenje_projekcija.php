<!-- Natalija Tosic 19/0346-->
<?php
<body>
<form>
if(empty($odobreniFilmovi)){
   echo "Ne postoji nijedan film trenutno.";
} else{
    <table class="filmovi" >
        foreach ($odobreniFilmovi as $film) {
            echo view("stranice/film", $film);
        }
    </table>
}
<fieldset>
    <aside>
        <legend>Izaberite kada zelite da se film prikazuje</legend>
        <table align="center">
            <tr>
                <td>
                    <select name="sale" id="sale" required>
                        <option value="" disabled selected>Izaberite salu</option>
                        <option value="Sala1">Sala 1</option>
                        <option value="Sala2">Sala 2</option>
                        <option value="Sala3">Sala 3</option>
                    </select>
                </td>
                <td>
                    <select name="dani" id="dani" required>
                        <option value="" disabled selected>Izaberite dan</option>
                        <option value="ponedeljak">Ponedeljak</option>
                        <option value="utorak">Utorak</option>
                        <option value="sreda">Sreda</option>
                        <option value="cetvrtak">Cetvrtak</option>
                        <option value="petak">Petak</option>
                        <option value="subota">Subota</option>
                        <option value="nedelja">Nedelja</option>
                    </select>
                </td>
                <td>
                    <select name="sati" id="sati" required>
                        <option value="" disabled selected>Izaberite vreme</option>
                        <option value="8:30">8:30</option>
                        <option value="10:15">10:15</option>
                        <option value="14:30">14:30</option>
                        <option value="15:45">15:45</option>
                        <option value="18:00">18:00</option>
                    </select>
                </td>
                <td> <input type="submit" name="Posalji" value="Napravi"></td>
            </tr>
        </table>
</fieldset>
</aside>
</form>
</body>
</html>