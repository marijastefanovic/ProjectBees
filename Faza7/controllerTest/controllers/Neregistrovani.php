<?php namespace App\Controllers;

#Anja Negic 676/19
#Marija Stefanovic 2019/0068
#Ana Stanic 2019/0703
use CodeIgniter\Config\Factories;
use App\Models\PremijereModel;
use App\Models\KorisnikModel;
use App\Models\AdminModel;
use App\Models\GledalacModel;
use App\Models\PredstavnikModel;

use App\Models\ProjekcijaModel;
use App\Models\FilmModel;
use App\Models\UcesnikUFilmuModel;
use App\Models\ReziserModel;
use App\Models\GlumacModel;
use App\Models\SalaModel;
class Neregistrovani extends BaseController
{
	#Anja Negic 2019/676
    protected function prikaz($page, $data){
         $data['controller']='Neregistrovani';
        if ($page=="index")
             $data['stranica']='pocetna';
        else $data['stranica']=$page;
        echo view('sablon/header_neregistrovan', $data);
        if ($page != 'registracija' && $page != 'login')
        echo view('sablon/header_pretraga', $data);
        echo view("stranice/$page", $data);
    }

    #Anja Negic 2019/676
    protected function filmPrikaz($page, $data){
        $data['controller']='Neregistrovani';
        $data['stranica']=$page;
        echo view('sablon/header_neregistrovan', $data);
        echo view("stranice/$page", $data);
    }

    #Anja Negic 2019/676
    public function pocetna(){
        if($this->session->get('ulogovan')==null){
        
            $this->session->set('ulogovan',false);
        }
       // $projekcijaModel=new ProjekcijaModel();
        //$filmModel = new FilmModel();
        $projekcijaModel=Factories::models('App\Models\ProjekcijaModel');
        $filmModel = Factories::models('App\Models\FilmModel');
        $projekcije = $projekcijaModel;
        $filmovi= $filmModel->findAll();
        $this->prikaz('index', ['filmovi'=>$filmovi, 'projekcije'=>$projekcije]);
    }
    #Anja Negic 2019/676
    public function premijere(){
        //$projekcijaModel=new ProjekcijaModel();
        //$filmModel = new FilmModel();
        $projekcijaModel=Factories::models('App\Models\ProjekcijaModel');
        $filmModel = Factories::models('App\Models\FilmModel');
        $projekcije = $projekcijaModel->findAll();
        $filmovi= $filmModel->findAll();
        $this->prikaz('premijere',['filmovi'=>$filmovi, 'projekcije'=>$projekcije]);
    }
    #Anja Negic 2019/676
    public function pretraga(){
        $pretraga=null;
        $this->session->set('pretraga', $pretraga);
        $this->prikaz('index',[]);
    }
    #Anja Negic 2019/676
    public function login(){
        $this->prikaz('login', []);
    }
    #Anja Negic 2019/676
    public function registracija(){
        $this->prikaz('registracija', []);
    }
    #Anja Negic 2019/676
    public function film($idP){
       // $projekcijaModel=new ProjekcijaModel();
       $projekcijaModel=Factories::models('App\Models\ProjekcijaModel');
        $filmModel = Factories::models('App\Models\FilmModel');
        $projekcija = $projekcijaModel->find($idP);
        $ucesnikUFilmuModel = new UcesnikUFilmuModel();
        $glumacModel = new GlumacModel();
        $reziserModel = new ReziserModel();
        $salaModel = new SalaModel();

       
       // $filmModel = new FilmModel();
        $film = $filmModel->find($projekcija->IdF);
        $glumac = $film->IdUG;
        $reziser = $film->IdUR;
        $idG = $film->IdUG;
        $idR = $film->IdUR;
        $sala = $salaModel->find($projekcija->IdS);
        $ucesnikG = $ucesnikUFilmuModel->find($idG);
        $ucesnikR = $ucesnikUFilmuModel->find($idR);
        $this->filmPrikaz('filmPrikaz', ['film'=>$film, 'projekcija'=>$projekcija, 'ucesnikG'=>$ucesnikG, 'ucesnikR'=>$ucesnikR, 'sala'=>$sala]);

    }

    
    #Funkcija za registraciju korisnika popunjavanjem odgovarajucih polja
    #Dodatak:provera validnosti podataka
    public function registruj(){
        $korisnikModel=new KorisnikModel();
        
        $ime= $this->request->getVar("Ime");
        $prezime= $this->request->getVar("Prezime");
        $mejlAdresa=$this->request->getVar("MejlAdresa");
        $lozinka= $this->request->getVar("Lozinka");
        $potvrdaLozinke=$this->request->getVar("LozinkaPotvrda");
        $kompanija=$this->request->getVar("kompanija");
         if(!$this->validate(['Ime'=>'required', 'Prezime'=>'required', 'MejlAdresa'=>'required', 'Lozinka'=>'required', 'LozinkaPotvrda'=>'required'])){
            return $this->prikaz('registracija', 
                ['errors'=>$this->validator->getErrors()]);
               
        }
        if ($lozinka!==$potvrdaLozinke){
            $poruka = "Lozinke se ne podudaraju!";
            return $this->prikaz('registracija', 
            ['errorsLozinka'=>$poruka]);
        }
        $korisnici = $korisnikModel;
        $korisnik = $korisnici->dohvatiSaIstimMailom($mejlAdresa);
     
        foreach($korisnik as $korisnikJedan){
            if ($korisnikJedan->Mejl==$mejlAdresa){
                $poruka = "Već postojeći mejl!";
                return $this->prikaz('registracija', 
                ['errorsMejl'=>$poruka]);
            }
        }
        $data=[
            'Ime'=>"$ime",
            'Prezime'=>"$prezime",
            'Mejl'=>"$mejlAdresa",
            'Lozinka'=>"$lozinka",

        ];
        
        $korisnici->insert($data);
        $ubacen=$korisnici->like("Mejl", $mejlAdresa)->find();
        $id=$ubacen[0]->IdK;
        if(isset($_POST['Registracija'])){
            $gledalac=[
                "IdG"=>"$id",
            ];
            $gledaoci=new GledalacModel();
            $gledaoci->insert($gledalac);
            $this->login();
          
        }else if(isset($_POST['Registracija2'])){
            $predstavnikFilma=[
                "IdPF"=>"$id",
                "Kompanija"=>"$kompanija",
            ];
            $predstavnici=new PredstavnikModel();
            $predstavnici->insert($predstavnikFilma);
            $this->login();
        }

    }

    #Prijavljivanje korisnika na sistem koristi mejl i lozinku
    #Preusmeravanje na odgovarajuce stranice za odgovarajuce korisnike
    public function loginSubmit()
    {
        
        $mejl=$this->request->getVar('mejl');
        
        $lozinka= $this->request->getVar('lozinka');
        
        $temp=-1;
        $kor=new KorisnikModel();
        $gl=new GledalacModel();
        $ad= new AdminModel();
        $pr=new PredstavnikModel();
        
        $korisnik=$kor->like('Mejl', $mejl)->find();
        
        
        if($korisnik==null){
            $poruka="Korisnik sa ovom mejl adresom ne postoji";
            $data['controller']='Neregistrovani';
            echo view('sablon/header_neregistrovan', $data);
            echo view("stranice/login",["poruka"=>$poruka]);
            return;

        }else{
            if($korisnik[0]->Lozinka!=$lozinka){
            $poruka="Pogresna lozinka";
            $data['controller']='Neregistrovani';
            echo view('sablon/header_neregistrovan', $data);
            echo view("stranice/login",["poruka"=>$poruka]);
            return;
                
            }else{
                if($gl->find($korisnik[0]->IdK)){
                    $this->session->set('IdK', $korisnik[0]->IdK);
                    $this->session->set('ulogovan',true);
                   
                    return redirect()->to(site_url('Gledalac/pocetna'));
                    
                }else if($ad->find($korisnik[0]->IdK)){
                    $this->session->set('IdK', $korisnik[0]->IdK);
                    $this->session->set('ulogovan',true);
                    return redirect()->to(site_url('Admin/index'));
                    
                }else if($pr->find($korisnik[0]->IdK)){
                    $this->session->set('IdK', $korisnik[0]->IdK);
                    $this->session->set('ulogovan',true);
                    return redirect()->to(site_url('Predstavnik/prikazSlanjaZahteva'));
                    
                }else{
                    $poruka="Doslo je do greske. Molimo pokusajte ponovo";
                    $data['controller']='Neregistrovani';
                    echo view('sablon/header_neregistrovan', $data);
                    echo view("stranice/login",["poruka"=>$poruka]);
                    return;
                   
                }

               
            }

        }
    }
    #Odjavljivanje korisnika sa sistema i vracanje na pocetnu stranicu
    public function logout(){
        $this->session->set('IdK', -1);
        $this->session->set('ulogovan',false);
        return redirect()->to(site_url("Neregistrovani/pocetna"));
    }

} 
