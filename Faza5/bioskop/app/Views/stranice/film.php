<!--Natalija Tosic 19/0346-->
<?php
echo '<tr>';
$image = imagecreatefromstring($film->Poster); 
 ob_start();
 imagejpeg($image, null, 80);
 $data = ob_get_contents();
 ob_end_clean();
 echo'       <td class="poster"><img src="data:image/png;base64,' .  base64_encode($data)  . '" height = 170 width = 120></td>';
echo"<td>$film->Naziv</td>
<td><input type='radio' id='izabran' name='izabran' value ='$film->IdF' required onchange='izracunajtermine($film->IdF);'></td>
</tr>";