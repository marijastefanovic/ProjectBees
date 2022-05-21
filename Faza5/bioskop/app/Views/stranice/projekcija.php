<!-- Natalija Tosic 19/0346-->
<?php
if(empty($projekcija)){}
else{
<table class="film">
<tr>
    <td class="poster"><img src="slike/betmen_poster.jpg"></td>
    <td align = "center">$projekcija->Naziv</td>
    <td> $projekcija->Sala</td>
    <td>$projekcija->Datum</td>
    <td>$projekcija->Vreme</td>
    <td ><button onclick="myFunction($projekcija->id)">Obrisi projekciju</button></td>
</tr>
</table>
}
