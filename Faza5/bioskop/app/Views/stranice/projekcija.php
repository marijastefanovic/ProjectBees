<!-- Natalija Tosic 19/0346-->
<?php
if(empty($projekcija)){}
else{
echo '<table class="film">';
echo '<tr>';
echo '<td class="poster">';
if(!empty($projekcija->Poster)&&$projekcija->Poster!=""){
$image = imagecreatefromstring($projekcija->Poster); 
 ob_start();
 imagejpeg($image, null, 80);
 $data = ob_get_contents();
 ob_end_clean();
 echo'<img src="data:image/png;base64,' .  base64_encode($data)  . '" height = 170 width = 120>';
} else{
echo "<img src=";
 echo base_url('Slike/NoImage.png');
 echo " width='120' height='170'>";
}
 echo '</td>';
echo"    <td align = 'center'>$projekcija->Naziv</td>";
echo"    <td> $projekcija->nazivSale</td>";
echo"    <td>$projekcija->Datum</td>";
echo"    <td>$projekcija->Vreme</td>";
echo"    <td ><button onclick='myFunction($projekcija->IdP)'>Obrisi projekciju</button></td>";
echo'</tr>';
echo'</table>';
}
