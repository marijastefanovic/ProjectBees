<!-- Natalija Tosic 19/0346-->
<?php
if(empty($projekcije)){
   echo "Ne postoji nijedna projekcija trenutno.";
} else{
    foreach ($projekcije as $projekcija) {
        echo view('stranice/projekcija',['projekcija'=>$projekcija]);
    }
}
echo "</body>";
echo "</html>";