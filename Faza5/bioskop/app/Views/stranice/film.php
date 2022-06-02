<!--Natalija Tosic 19/0346-->
<?php
if(empty($film)){}
else{
echo '<tr>';
echo '<td class="poster">';
if(!empty($film->Poster)){
$image = imagecreatefromstring($film->Poster); 
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
echo"<td>$film->Naziv</td>
<td><input type='radio' id='izabran' name='izabran' value ='$film->IdF' required onchange='izracunajtermine($film->IdF);'></td>
</tr>";
}