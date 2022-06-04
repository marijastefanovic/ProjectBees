<!--Anja Negic-->
        <script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        </script>
        <div class="container m-3">
            <?php 
                use App\Models\ProjekcijeModel;
                use App\Models\FilmModel;
                $pretraga = 0;
                foreach ($filmovi as $film){
                    if ($film->Status == "prihvacen"){
                        $imaProjekcije=0;
                        $forma = !empty($_POST['pretraga']) ? $_POST['pretraga'] : NULL;
                        $zanr =  !empty($_POST['zanr']) ? $_POST['zanr'] : 'NULL';
                        $datumF =  !empty($_POST['datum']) ? $_POST['datum'] : NULL;
                        
                        $nasaoZanr = 0;
                        $nasaoNaziv = 0;

                        if ((strcmp($forma, $film->Naziv)==0)){
                                $nasaoNaziv = 1;
                        }

                            
                        if ($nasaoNaziv==1 || $forma == NULL){
                            
                            $zanroviFilma = explode(", ",$film->Zanr);
                            if ($zanr != NULL){
                                foreach ($zanroviFilma as $zanrF){
                                    if ((strcmp($zanrF, $zanr)==0)){
                                        $nasaoZanr = 1;
                                    }
                                }
                            }   
                            if ($zanr == 'NULL' || $nasaoZanr == 1){
                                $premijere = $projekcije->dohvatiPremijereFilma($film->IdF);
                                echo "<div class='row'> 
                                    <div class='col-md-3 poster'>
                                        <img src='data:image/jpeg;base64," . base64_encode( $film->Poster ) . "' />
                                    </div>
                                    <div class='col-md-9 premijere'>
                                        <div class='naziv'> {$film->Naziv} </div>"; 
                                        if ($datumF==NULL)
                                                    $dan = array (strtotime("now"),strtotime("tomorrow"), strtotime("+2 days"), strtotime("+3 days"), strtotime("+4 days"), strtotime("+5 days"), strtotime("+6 days"));
                                        else {$dan = array ($datumF);}
                                        foreach ($premijere as $premijera){ 
                                            $ispisan = 0; $pretraga = 1;
                                            foreach ($dan as $danas){ 
                                                if ((date('d.m.Y', strtotime($premijera->Datum))) == (date('d.m.Y', $danas))){
                                                    echo" 
                                                    <div class='datum'> ".date('d.m.Y',strtotime($premijera->Datum))." </div>
                                                    <div class='sala'>Sala {$premijera->IdS} </div>
                                                    <div><button class='btn btn-outline-info'>".anchor("$controller/film/{$premijera->IdP}", date('H:i',strtotime($premijera->Vreme)))."</button> </div>
                                                    ";
                                                    $imaProjekcije=1;
                                                }
                                            }
                                            if ($imaProjekcije==0)
                                                echo"<h5 class='ml-2'>Nažalost nema premijera filma za odabrani datum!</h5>";
                                            
                                        }
                                echo "</div> </div>";
                                
                            }
                        }
                    }
                }if ($pretraga == 0){
                    echo"<h2> Nažalost nema dostupnih filmova.</h2></div>";
                
                  }?>
            
        </div>
        
    </body>
</html>

