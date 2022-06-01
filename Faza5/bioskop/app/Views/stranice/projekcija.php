<!-- Natalija Tosic 19/0346-->
<?php
if(empty($projekcija)){}
else{
echo '<table class="film">';
echo '<tr>';$image = imagecreatefromstring($projekcija->Poster); 
ob_start();
imagejpeg($image, null, 80);
$data = ob_get_contents();
ob_end_clean();
echo'       <td class="poster" rowspan=4><img src="data:image/png;base64,' .  base64_encode($data)  . '" height = 170 width = 120></td>';
echo"    <td align = 'center'>$projekcija->Naziv</td>";
echo"    <td> $projekcija->nazivSale</td>";
echo"    <td>$projekcija->Datum</td>";
echo"    <td>$projekcija->Vreme</td>";
echo"    <td ><button onclick='myFunction($projekcija->IdP)'>Obrisi projekciju</button></td>";
echo'</tr>';
echo'</table>';
}
