<!--Natalija Tosic 19/0346-->
<?php
if(empty($zahtev)) {
}
else {
    <table class="film">
    <tr>
        <td class="poster" rowspan=3><img src="slike/betmen_poster.jpg" height = 170 width = 120></td>
        <td align = "center">echo $zahtev->Naziv</td>
        <td class="opis" align="left" rowspan=3> echo $zahtev->Opis</td>
        <td rowspan=3 align = right><button>Prihvati</button>&emsp;&emsp;<button>Odbij</button></td>
    </tr>
    <tr>
       <td align="center">echo $zahtev->Zanr |$zahtev->Duzina min</td>
    </tr>
    <tr>
        <td>Glumci:echo $zahtev->glumac</td>
    </tr>
</table>
}