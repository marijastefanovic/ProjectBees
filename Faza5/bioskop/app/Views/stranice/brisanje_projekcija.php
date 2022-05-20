<!-- Natalija Tosic 19/0346-->
<?php
<body>
if(empty($projekcije)){
   echo "Ne postoji nijedna projekcija trenutno.";
} else{
    foreach ($projekcije as $projekcija) {
        echo view("stranice/projekcija", $projekcija);
    }
}
</body>