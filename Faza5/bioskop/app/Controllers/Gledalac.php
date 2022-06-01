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
        $id=$this->session->get('IdP');

        $projekcije=new ProjekcijaModel();
        $filmovi=new FilmModel();
        $sale= new SalaModel();

        $projekcija=$projekcije->find($id);

        $idF=$projekcija->IdF;
        $idS=$projekcija->IdS;

        $sala=$sale->find($idS);
        $film=$filmovi->find($idF);

        $data["3"]=$film->Poster;
        $data["naziv"]=$film->Naziv;
        $data["datum"]=$projekcija->Datum;
        $data["sala"]=$sala->Naziv;
    
        return $this->prikaz("rezervacija",$data);

    }

    #funkcija prikazuje koja karta je rezervisana
    public function pregledKarte($idp){

        $projekcije=new ProjekcijaModel();
        $projekcija = $projekcije->find($idp);
        $filmovi=new FilmModel();
        $film=$filmovi->find($projekcija->IdF);
        $sale=new SalaModel();
        $sala=$sale->find($projekcija->IdS);
        $slika=$film->Poster;
        $data=[
            '0'=>"$film->Naziv",
            '1'=>"$projekcija->Datum",
            '2'=>"$sala->Naziv",
            '3'=>"$slika"
        ];
        
        echo view ("sablon/header_registrovani.php");
        echo view("stranice/pregled_rezervacije.php",["projekcija"=>$data]);

        
    }
    
    #funkcija omogucava rezervaciju karte ili mesta
    public function rezervisi(){
      
       
        

        $idp=$this->session->get('IdP');
        $idk=$this->session->get('IdK');
        //$idk=11;
        //$idp=1;

        $projekcije=new  ProjekcijaModel();
        $rezervacije= new RezervacijaModel();
        $sale=new SalaModel();
        $mesta=new MestaModel();
        $projekcija=$projekcije->find($idp);
        $filmovi=new FilmModel();
        $film=$filmovi->find($projekcija->IdF);
        $slika=$film->Poster;
        $ids=$projekcija->IdS;
        $sala=$sale->find($ids);
        $rezervacija=$rezervacije->like("IdP",$idp)->findAll();
        $broj=0;

        if($_SESSION['ulogovan']==false){
            $poruka="Ulogujte se";
            $data=[
                'naziv'=>"$film->Naziv",
                'datum'=>"$projekcija->Datum",
                'sala'=>"$sala->Naziv",
                '3'=>"$slika",
                
            ];
           
            echo view("stranice/rezervacija",["projekcija"=>$data,"poruka"=>$poruka]);
        }

        $obelezenaMesta=$this->request->getVar("obelezenaMesta");
        $biloKojeMesto=$this->request->getVar("mesto");
        $brojTrazenih=$this->request->getVar("brojKarata");
        if($obelezenaMesta!=NULL){
            $brojTrazenih=strlen($obelezenaMesta)/3;
        }
        
        $sedista=explode(";",$obelezenaMesta);

        if($biloKojeMesto=='on' && sizeof($sedista)<=1){
            $poruka="Molimo izaberite mesto u sali ili čekirajte 'Bilo koje mesto'";
            $data=[
                'naziv'=>"$film->Naziv",
                'datum'=>"$projekcija->Datum",
                'sala'=>"$sala->Naziv",
                '3'=>"$slika",
                
            ];
           
            echo view("stranice/rezervacija",["projekcija"=>$data,"poruka"=>$poruka]);
        }
        
        foreach($rezervacija as $rez ){
          
         
            if(sizeof($sedista)>1){
                
                $mesto = $mesta->like("IdR", $rez->IdR)->findAll();
                if($mesto!=null){
                    foreach($mesto as $m){
                        
                        for($i=1;$i<sizeof($sedista);$i++){
                            
                            $red=$sedista[$i][0];
                            $kolona=$sedista[$i][1];
                            
                            if($m->Red==$red && $m->Mesto==$kolona){
                                
                                $poruka="Izabrano mesto nije slobodno. Molimo izaberite drugo mesto.";
                                $data=[
                                    'naziv'=>"$film->Naziv",
                                    'datum'=>"$projekcija->Datum",
                                    'sala'=>"$sala->Naziv",
                                    '3'=>"$slika",
                                    
                                ];
                               
                                echo view("stranice/rezervacija",["projekcija"=>$data,"poruka"=>$poruka]);
                                return;
                            }
                        }
                    }
                }
            }

           
            $broj+=$rez->Broj_Karata;
        }
        
        
        if($sala->Broj_Mesta<=$broj+$brojTrazenih){
            $poruka="Nema dovoljno slobodnih karata za projekciju";
            $data=[
                'naziv'=>"$film->Naziv",
                'datum'=>"$projekcija->Datum",
                'sala'=>"$sala->Naziv",
                '3'=>"$slika",
                                    
            ];
                               
            echo view("stranice/rezervacija",["projekcija"=>$data,"poruka"=>$poruka]);
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