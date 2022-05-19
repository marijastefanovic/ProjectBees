<?php namespace App\Controllers;
use App\Models\ProjekcijeModel;
use App\Models\PremijereModel;
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
        $projekcijeModel = new ProjekcijeModel();
        $premijereModel = new PremijereModel();
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
} // SESIJE -> 1:46
