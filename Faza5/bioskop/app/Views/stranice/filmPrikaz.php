

<?php 
#Anja Negic 19/676
if(empty($film)) {
    echo "Film ne postoji!";
}
else {
    echo "
        <div class='container m-1'>
            <div class = 'row naslov ml-5'>
                $film->Naziv
            </div>
            <div class = 'row'>
                <div class = 'col-3'>
                    <img src='data:image/jpeg;base64," . base64_encode( $film->Poster ) . "' />
                </div>
                <div class = 'opis col-8'>
                    <div>
                        $film->Opis
                    </div><br>
                    <table class='table'>
                        <tr>
                            <td>Početak prikazivanja filma:</td>
                            <td>$film->Pocetak_prikazivanja</td>
                        </tr>
                        <tr>
                            <td>Dužina trajanja filma:</td>
                            <td>$film->Duzina</td>
                        </tr>
                        <tr>
                            <td>Država/Godina:</td>
                            <td>$film->Drzava_Godina</td>
                        </tr>
                        <tr>
                            <td>Žanr:</td>
                            <td>$film->Zanr</td>
                        </tr>
                        <tr>
                            <td>Glavni glumac:</td>
                            <td>$ucesnikG->Ime $ucesnikG->Prezime</td>
                        </tr>
                        <tr>
                            <td>Režiser:</td>
                            <td>$ucesnikR->Ime $ucesnikG->Prezime </td>
                        </tr>

                    </table>
                </div>
                <div class='col-1'>
                    ". date('d.m.Y', strtotime($projekcija->Datum))." <br>
                    ". date('H:i',strtotime($projekcija->Vreme))."<br>
                    $sala->Naziv <br>";
                    if ($controller=='Neregistrovani'){
                     echo "<button class='btn btn-outline-dark'>".anchor("$controller/registracija", "REZERVISI")."</button>";
                    }else {
                        $IdP = $projekcija->IdP;
                        
                       echo" <button class='btn btn-outline-dark'>".anchor("$controller/index/{$projekcija->IdP}", "REZERVISI")."</button>";
                    } echo"
                </div>
               
            </div>
        </div>";
}

