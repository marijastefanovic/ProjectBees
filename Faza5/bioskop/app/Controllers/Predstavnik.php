<?php
#Ana Stanic 2019/0703
namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\GlumacModel;
use App\Models\ReziserModel;
use App\Models\UcesnikUFilmuModel;
use App\Models\PredstavnikModel;

class Predstavnik extends BaseController
{
    public function index()
    {
        
    }

    /*
    *Funkcija za prikazivanje stranice na kojoj se stvara zahtev za prikazivanje filma
    */
    public function prikazSlanjaZahteva(){
        echo view ('sablon/header_registrovani.php');
        echo view('stranice/slanje_zahteva.php');
    }
    /*
    *Nakon stvaranja zahteva u ovoj funkciji se zahtev salje i upisuje u bazu podataka
    */
    public function posaljiZahtev(){
        $IdPF = 0;

        $naziv= $this->request->getVar("Naziv");
        $opis= $this->request->getVar("Opis");
        $trajanje=$this->request->getVar("Trajanje filma");
        $glumci= $this->request->getVar("Glumci");
        $reziseri=$this->request->getVar("Reziseri");
        $pocetak=$this->request->getVar("Jezik");
        $poster=$this->request->getVar("Poster filma");
        $trejler=$this->request->getVar("Trejler filma");
        $zanrovi=$this->request->getVar("Zanr");
        
        $glumciModel= new GlumacModel();
        $reziseriModel=new ReziserModel();
        $ucesnici= new UcesnikUFilmuModel();
        $filmovi= new FilmModel();
       
        $glumac=explode(" ",$glumci);
        $nadjenGlumac=null;
        if($glumac[0]){
            if(sizeof($glumac)!=1){
                $nadjenGlumac=$ucesnici->where("Ime",$glumac[0],"Prezime", $glumac[1])->findAll();
            }else{
                $nadjenGlumac=$ucesnici->like("Ime",$glumac[0])->findAll();
            }
        }
        $reziser=explode(" ", $reziseri);
        $nadjenReziser=null;
        if($reziser[0]){
            if(sizeof($reziser)!=1){
                $nadjenReziser=$ucesnici->where("Ime",$reziser[0],"Prezime", $reziser[1])->findAll();
            }else{
                $nadjenReziser=$ucesnici->where("Ime",$reziser[0])->findAll();
            }
        }
        if($nadjenGlumac==null){
            if(sizeof($glumac)>1){
                $prezime=$glumac[1];
        
            }else{
                $prezime='';
            }
            $data=[
                'Ime'=>"$glumac[0]",
                'Prezime'=>"$prezime"
            ];
            $idg=$ucesnici->insert($data);
            $data2=[
                "IdUG"=>"$idg"
            ];
            $glumciModel->insert($data2);
        }else{
            $idg=$nadjenGlumac[0]->IdU;
        }
        if($nadjenReziser==null){
            if(sizeof($reziser)>1){
                $prezime=$reziser[1];
        
            }else{
                $prezime='';
            }
            $data=[
                'Ime'=>"$reziser[0]",
                'Prezime'=>"$prezime"
            ];
            $idr=$ucesnici->insert($data);
            $data2=[
                "IdUR"=>"$idr"
            ];
            $reziseriModel->insert($data2);
        }else{
            $idr=$nadjenReziser[0]->IdU;
        }
        $IdK= $this->session->get('IdK');
        $idPF=$IdK;
       
       $dataFilm=[
           'Naziv'=>"$naziv",
           'Opis' =>"$opis",
           'Duzina' =>"$trajanje",
           'Drzava_Godina' =>"$trajanje",
           'Pocetak_prikazivanja' =>"$pocetak",
           'Zanr' =>"$zanrovi",
           'Status' =>"neresen",
           'Poster' =>"$poster",
           'Trejler' =>"$trejler",
           'IdUG' =>"$idg",
           'IdUR' =>"$idr",
           'IdPF'=>"$idPF"
       ];
       $filmovi->insert($dataFilm);
       //echo base64_encode($poster);
       $this->pregledZahteva($idPF);

    }


    /*
    *Funkcija za izlistavanje poslatih zahteva za konkretnog predstavnika filma
    */
    public function pregledZahteva($IdPF){
        $predstavnikFilma = new PredstavnikModel();
        $filmModel = new FilmModel();
        $ucesnikUFilmuModel = new UcesnikUFilmuModel();
        $glumacModel = new GlumacModel();
        $reziserModel = new ReziserModel();
       
        $filmovi =  $filmModel->dohvatiFilmPoIdPF($IdPF);
       
        /*$glumac = $film->IdUG;
        $reziser = $film->IdUR;
        $idG = $film->IdUG;
        $idR = $film->IdUR;
        $ucesnikG = $ucesnikUFilmuModel->find($idG);
        $ucesnikR = $ucesnikUFilmuModel->find($idR);*/


        echo view ('sablon/header_registrovani.php');
        echo view("stranice/pregled_poslatih_zahteva", ['filmovi' => $filmovi] );;
    }
}

