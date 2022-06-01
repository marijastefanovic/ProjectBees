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
        if(session_status()==PHP_SESSION_NONE){
            session_start();
            $id=$this->session->set('ulogovan',false);
        }
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
                   
                    return redirect()->to(site_url('Neregistrovani/index'));
                    
                }else if($ad->find($korisnik[0]->IdK)){
                    $this->session->set('IdK', $korisnik[0]->IdK);
                    $this->session->set('ulogovan',true);
                    return redirect()->to(site_url('Admin/index'));
                    
                }else if($pr->find($korisnik[0]->IdK)){
                    $this->session->set('IdK', $korisnik[0]->IdK);
                    $this->session->set('ulogovan',true);
                    return redirect()->to(site_url('PredstavnikFilma/index'));
                    
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
        return redirect()->to(site_url("Neregistrovani/index"));
    }
} // SESIJE -> 1:46
