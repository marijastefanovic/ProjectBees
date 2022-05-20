<!-- Natalija Tosic 19/0346-->
<?php
<body>
if(empty($zahtevi)){
   echo "Ne postoji nijedan nerešen zahtev trenutno.";
} else{
    foreach ($zahtevi as $zahtev) {
        echo view("stranice/zahtev", $zahtev);
    }
}
</body>
</html>