<?php namespace App\Controllers;


#Marija Stefanovic 2019/0068
use App\Models\ProjekcijeModel;
use App\Models\PremijereModel;
use App\Models\KorisnikModel;
use App\Models\AdminModel;
use App\Models\GledalacModel;
use App\Models\PredstavnikModel;
class Neregistrovani extends BaseController
{
    protected function prikaz($page, $data){
        $data['controller']='Neregistrovani';
        echo view('sablon/header_neregistrovan', $data);
        echo view('sablon/header_pretraga', $data);
        echo view("stranice/$page", $data);
    }

    public function index(){
        //$this->load->library('image_lib');
        //$projekcijeModel = new ProjekcijeModel();
        //$premijereModel = new PremijereModel();
        $this->prikaz('pocetna', []);
    }

    public function premijere(){
       $this->prikaz('premijere',[]);
    }

    public function pretraga(){
        $this->prikaz('pocetna',[]);
    }

    public function login(){
        $this->prikaz('login', []);
    }

    public function registracija(){
        $this->prikaz('registracija', []);
    }
    
    public function registruj(){
        $ime= $this->request->getVar("Ime");
        $prezime= $this->request->getVar("Prezime");
        $mejlAdresa=$this->request->getVar("MejlAdresa");
        $lozinka= $this->request->getVar("Lozinka");
        $potvrdaLozinke=$this->request->getVar("Molimo potvrdite lozinku");
        $kompanija=$this->request->getVar("Naziv Vase kompanije");
        
        $data=[
            'Ime'=>"$ime",
            'Prezime'=>"$prezime",
            'Mejl'=>"$mejlAdresa",
            'Lozinka'=>"$lozinka",

        ];
        
        //echo $mejlAdresa;
        //echo "nije dobar mejl";
        var_dump($data);
        $korisnici=new KorisnikModel();
        $korisnici->insert($data);
        $ubacen=$korisnici->like("Mejl", $mejlAdresa)->find();
        $id=$ubacen[0]->IdK;
        if(isset($_POST['Registracija'])){
            $gledalac=[
                "IdG"=>"$id",
            ];
            $gledaoci=new GledalacModel();
            $gledaoci->insert($gledalac);
            echo 'nesto';
        }else if(isset($_POST['Registracija2'])){
            $predstavnikFilma=[
                "IdPF"=>"$id",
                "Kompanija"=>"$kompanija",
            ];
            $predstavnici=new PredstavnikModel();
            $predstavnici->insert($predstavnikFilma);
        }
        echo $id;

        echo "radiii";
    }

    
    #Prijavljivanje korisnika na sistem koristi mejl i lozinku
    #Preusmeravanje na odgovarajuce stranice za odgovarajuce korisnike
    public function loginSubmit()
    {
        session_start();
        $mejl=$this->request->getVar('mejl');
        
        $lozinka= $this->request->getVar('lozinka');
        
        $kor=new KorisnikModel();
        $gl=new GledalacModel();
        $ad= new AdminModel();
        $pr=new PredstavnikModel();
        
        $korisnik=$kor->like('Mejl', $mejl)->find();
        
        
        if($korisnik==null){
            echo "Korisnik sa ovom mejl adresom ne postoji";
        }else{
            if($korisnik[0]->Lozinka!=$lozinka){
                echo "Pogresna lozinka";
            }else{
                if($gl->find($korisnik[0]->IdK)){
                    $_SESSION["Ulogovan"]=true;
                    $_SESSION["Korisnik"]=$korisnik[0]->IdK;
                    return redirect()->to(site_url('Neregistrovani/index'));
                }else if($ad->find($korisnik[0]->IdK)){
                    $_SESSION["Ulogovan"]=true;
                    $_SESSION["Korisnik"]=$korisnik[0]->IdK;
                    return redirect()->to(site_url('Admin/index'));
                }else if($pr->find($korisnik[0]->IdK)){
                    $_SESSION["Ulogovan"]=true;
                    $_SESSION["Korisnik"]=$korisnik[0]->IdK;
                    return redirect()->to(site_url('PredstavnikFilma/index'));
    
                }
               
            }

        }
    
        
        
        
    }
} // SESIJE -> 1:46