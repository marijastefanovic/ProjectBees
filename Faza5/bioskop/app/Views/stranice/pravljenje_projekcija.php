<!-- Natalija Tosic 19/0346-->
<body>
<form action="<?= site_url("Admin/napravi_projekciju") ?>" method="post">
<?php
if(empty($filmovi)){
   echo "Ne postoji nijedan film trenutno.";
} else{
   echo "<table class='filmovi' >";
        foreach ($filmovi as $film) {
            echo view("stranice/film",['film'=> $film]);
        }
    echo "</table>";
}?>
<fieldset>
    <aside>
        <legend>Izaberite kada zelite da se film prikazuje</legend>
        <table align="center">
            <tr>
                <td>
                    <select name="sale" id="sale" required onclick()="popuniDane()">
                        <option value="" disabled selected>Izaberite salu</option>
                    </select>
                </td>
                <td>
                    <select name="dani" id="dani" required onclick()="popuniSate()">
                        <option value="" disabled selected>Izaberite dan</option>
                    </select>
                </td>
                <td>
                    <select name="sati" id="sati" required>
                        <option value="" disabled selected>Izaberite vreme</option>
                    </select>
                </td>
                <td> <input type="submit" name="Posalji" value="Napravi"></td>
            </tr>
        </table>
</fieldset>
</aside>
</form>
<script>
    var dani = document.getElementById("dani");
    var sale = document.getElementById("dale");
    $(function() {
    $('#sale').change(function() {
        popuniDane();
    });
});
$(function() {
    $("#dani").change(function() {
        popuniSate();
    });
});
</script>
</body>
</html>