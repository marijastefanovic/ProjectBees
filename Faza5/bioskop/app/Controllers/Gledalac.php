<?php

namespace App\Controllers;
#Marija Stefanovic 2019/0068
use App\Models\FilmModel;
use App\Models\ProjekcijaModel;
use App\Models\SalaModel;
use App\Models\RezervacijaModel;
use App\Models\MestaModel;

#kontroler koji opisuje ponasanje gledaoca 
class Gledalac extends BaseController
{
    #funkcija prikazije koji stranicu za rezervaciju karte za film
    protected function prikaz($page, $data){

        $data['controller']='Gledalac';
        echo view('sablon/header_registrovani');
        echo view("stranice/$page", $data);
    }

    #funkcija poziva funkciju prikaz za odgovarajuci film 
    public function index(){
        $id=$_SESSION['IdP'];

        $projekcije=new ProjekcijaModel();
        $filmovi=new FilmModel();
        $sale= new SalaModel();

        $projekcija=$projekcije->find($id);

        $idF=$projekcija[0]->IdF;
        $idS=$projekcija[0]->IdS;

        $sala=$sale->find($idS);
        $film=$filmovi->find($idF);

        $data["poster"]=$film[0]->Poster;
        $data["naziv"]=$film[0]->Naziv;
        $data["datum"]=$projekcija[0]->Datum;
        $data["sala"]=$sala[0]->Naziv;
    
        return $this->prikaz("rezervacija",$data);

    }

    #funkcija prikazuje koja karta je rezervisana
    public function pregledKarte(){
        $projekcije=new ProjekcijaModel();
        $projekcija = $projekcije->find(1);
        $filmovi=new FilmModel();
        $film=$filmovi->find($projekcija->IdF);
        $sale=new SalaModel();
        $sala=$sale->find($projekcija->IdS);
        $slika=$film->Poster;
        $data=[
            '0'=>"$film->Naziv",
            '1'=>"$projekcija->Datum.' '.$projekcija->Vreme",
            '2'=>"$sala->Naziv",
            '3'=>"$slika"
        ];
        echo view ("sablon/header_registrovani.php");
        echo view("stranice/pregled_rezervacije.php",["projekcija"=>$data]);

        
    }
    
    #funkcija omogucava rezervaciju karte ili mesta
    public function rezervisi(){
        
        $obelezenaMesta=$this->request->getVar("obelezenaMesta");
        $biloKojeMesto=$this->request->getVar("mesto");
        $brojTrazenih=$this->request->getVar("brojKarata");
        if($obelezenaMesta!=NULL){
            $brojTrazenih=strlen($obelezenaMesta)/3;
        }
        $sedista=explode(";",$obelezenaMesta);
        //var_dump($sedista);
        //echo $sedista[1][0];
        //var_dump($sedista);

        //$idp=$_SESSION['Projekcija'];
        //$idk=$_SESSION["IdK"];
        $idk=11;
        $idp=1;

        $projekcije=new  ProjekcijaModel();
        $rezervacije= new RezervacijaModel();
        $sale=new SalaModel();
        $mesta=new MestaModel();
        $projekcija=$projekcije->find($idp);
        //var_dump($projekcija);
        $ids=$projekcija->IdS;
        $sala=$sale->find($ids);
        $rezervacija=$rezervacije->like("IdP",$idp)->findAll();
        $broj=0;
        foreach($rezervacija as $rez ){
            //echo $rez->IdR;
            //echo "ovde";

            if($sedista[0]!=''){
                $mesto = $mesta->like("IdR", $rez->IdR)->findAll();
                if($mesto!=null){
                    foreach($mesto as $m){
                        for($i=1;$i<=sizeof($sedista);$i++){
                            
                            $red=$sedista[$i][0];
                            $kolona=$sedista[$i][1];
                            if($m->Red==$red && $m->Mesto==$kolona){
                                echo "Trazeno mesto nije slobodno";
                                return;
                            }
                        }
                    }
                }
            }

           
            $broj+=$rez->Broj_Karata;
        }
        //var_dump($sala);
        
        if($sala->Broj_Mesta<=$broj+$brojTrazenih){
            echo "nema dovoljno slobodnih karata";
            return;
        }

        $data=[
            //'IdR'=>"$idr",
            'Broj_Karata'=>"$brojTrazenih",
            'IdP'=>"$idp",
            'IdG'=>"$idk",

        ];
        $idrezerv=$rezervacije->insert($data);
    
        if($biloKojeMesto!='on'){
            var_dump($sedista);
            for($i=1;$i<sizeof($sedista);$i++){
                          echo $i;  
                $red=$sedista[$i][0];
                $kolona=$sedista[$i][1];
                $datam=[
                    'Red'=>"$red",
                    'Mesto'=>"$kolona",
                    'IdS'=>"$ids",
                    'IdR'=>"$idrezerv"
                ];
                $mesta->insert($datam);
            }
            
        }
        
        Gledalac::pregledKarte($idp);
    }
    
    

    
    

    
}