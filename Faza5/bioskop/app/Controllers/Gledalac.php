<?php

namespace App\Controllers;
#Marija Stefanovic 2019/0068
#Anja Negic 676/19

use App\Models\FilmModel;
use App\Models\ProjekcijaModel;
use App\Models\SalaModel;
use App\Models\RezervacijaModel;
use App\Models\MestaModel;
use App\Models\PremijereModel;
use App\Models\KorisnikModel;
use App\Models\AdminModel;
use App\Models\GledalacModel;
use App\Models\PredstavnikModel;
use App\Models\UcesnikUFilmuModel;
use App\Models\ReziserModel;
use App\Models\GlumacModel;

#kontroler koji opisuje ponasanje gledaoca 
class Gledalac extends BaseController
{
    #funkcija prikazije koji stranicu za rezervaciju karte za film
    protected function prikaz($page, $data){

        $data['controller']='Gledalac';
        if($page!='rezervacija'){
        echo view('sablon/header_registrovani',$data);
        }
        echo view("stranice/$page",["projekcija"=>$data]);
    }

    #funkcija poziva funkciju prikaz za odgovarajuci film 
    # @param $id int
    public function index($id){ 

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
        $this->session->set('IdP',$id);
        if($this->session->get('ulogovan')==1){
         echo view("sablon/header_gledalacr");
        }else{
            echo view("sablon/header_gledalacn");
        }
        
        echo view("stranice/rezervacija",['projekcija'=>$data]);

    }

    #funkcija prikazuje koja karta je rezervisana
    # @param $idp  int
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
        $data['controller']='Gledalac';
        echo view ("sablon/header_registrovani.php",$data);
        echo view("stranice/pregled_rezervacije.php",["projekcija"=>$data]);

        
    }
    
    #funkcija omogucava rezervaciju karte ili mesta
    public function rezervisi(){
        $idp=$this->session->get('IdP');
        $idk=$this->session->get('IdK');
    

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

        if($this->session->get('ulogovan')!=1){
            
            $poruka="Molimo ulogujte se.";
            $data=[
                'naziv'=>"$film->Naziv",
                'datum'=>"$projekcija->Datum",
                'sala'=>"$sala->Naziv",
                '3'=>"$slika",
                
            ];
            if($this->session->get('ulogovan')==1){
                echo view("sablon/header_gledalacr");
               }else{
                   echo view("sablon/header_gledalacn");
               }
           
            echo view("stranice/rezervacija",["projekcija"=>$data,"poruka"=>$poruka]);
            return;
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
            if($this->session->get('ulogovan')==1){
                echo view("sablon/header_gledalacr");
               }else{
                   echo view("sablon/header_gledalacn");
               }
           
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
                                if($this->session->get('ulogovan')==1){
                                    echo view("sablon/header_gledalacr");
                                   }else{
                                       echo view("sablon/header_gledalacn");
                                   }
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
            if($this->session->get('ulogovan')==1){
                echo view("sablon/header_gledalacr");
               }else{
                   echo view("sablon/header_gledalacn");
               }            
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
    #Anja Negic 2019/676
    protected function prikazProjekcija($page, $data){
        $data['controller']='Gledalac';
        if ($page=="index")
        $data['stranica']='pocetna';
        else $data['stranica']=$page;
        echo view('sablon/header_registrovani', $data);
        echo view('sablon/header_pretraga', $data);
        echo view("stranice/$page", $data);
    }
    #Anja Negic 2019/676
    protected function filmPrikaz($page, $data){
        $data['controller']='Gledalac';
        $data['stranica']=$page;
        echo view('sablon/header_registrovani', $data);
        echo view("stranice/$page", $data);
    }

    #Anja Negic 2019/676
    public function pocetna(){
        $projekcijaModel=new ProjekcijaModel();
        $filmModel = new FilmModel();
        $projekcije = $projekcijaModel;
        $filmovi= $filmModel->findAll();
        $this->prikazProjekcija('index', ['filmovi'=>$filmovi, 'projekcije'=>$projekcije]);
    }
    #Anja Negic 2019/676
    public function premijere(){
        $projekcijaModel=new ProjekcijaModel();
        $filmModel = new FilmModel();
        $projekcije = $projekcijaModel;
        $filmovi= $filmModel->findAll();
        $this->prikazProjekcija('premijere',['filmovi'=>$filmovi, 'projekcije'=>$projekcije]);
    }
    #Anja Negic 2019/676
    public function pretraga(){
        $pretraga=null;
        $this->session->set('pretraga', $pretraga);
        $this->prikazProjekcija('index',[]);
    }
    #Anja Negic 2019/676
    public function login(){
        $this->prikazProjekcija('login', []);
    }
    #Anja Negic 2019/676
    public function registracija(){
        $this->prikazProjekcija('registracija', []);
    }
    #Anja Negic 2019/676
    public function film($idP){
        $projekcijaModel=new ProjekcijaModel();
        $projekcija = $projekcijaModel->find($idP);
        $ucesnikUFilmuModel = new UcesnikUFilmuModel();
        $glumacModel = new GlumacModel();
        $reziserModel = new ReziserModel();
        $salaModel = new SalaModel();

       
        $filmModel = new FilmModel();
        $film = $filmModel->find($projekcija->IdF);
        $glumac = $film->IdUG;
        $reziser = $film->IdUR;
        $idG = $film->IdUG;
        $idR = $film->IdUR;
        $sala = $salaModel->find($projekcija->IdS);
        $ucesnikG = $ucesnikUFilmuModel->find($idG);
        $ucesnikR = $ucesnikUFilmuModel->find($idR);


        $this->session->set('idP');
        $this->filmPrikaz('filmPrikaz', ['film'=>$film, 'projekcija'=>$projekcija, 'ucesnikG'=>$ucesnikG, 'ucesnikR'=>$ucesnikR, 'sala'=>$sala]);

    }
    

    
}