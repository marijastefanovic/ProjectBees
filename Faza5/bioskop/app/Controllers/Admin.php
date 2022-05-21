<!-- Natalija Tosic 19/0346>-->
<?php namespace App\Controllers;
use App\Models\ProjekcijeModel;
use App\Models\FilmModel;
class Admin extends BaseController
{
    protected function prikaz($page, $data){
        $data['controller']='Admin';
        echo view('sablon/header_admin', $data);
        echo view("stranice/$page", $data);
    }
    public function index(){
        $this->zahtevi();
    }
    <!-- prikazuje sve zahteve tj. filmove koji nisu ni potvrdjeni ni odbijeni-->
    public function zahtevi(){
        $filmModel = new FilmModel();
        $zahtevi = $filmModel->dohvatiSveZahteve();
        $this->prikaz('zahtevi',['zahtevi'->$zahtevi]);
    }
    <!-- prikazuje sve filmove koji su odobreni za koje onda moze da se napravi projekcija-->
    public function pravljenje_projekcija(){
        $filmModel = new FilmModel();
        $odobreniFilmovi = $filmModel->dohvatiSveOdobreneFilmove();
        $this->prikaz('pravljenje_projekcija',['filmovi'->$odobreniFilmovi]);
    }
    <!-- prikazuje sve projekcije koje onda mogu da se obrisu-->
    public function brisanje_projekcija(){
        $projekcijeModel = new ProjekcijaModel();
        $projekcije = $projekcijeModel->dohvatiSveProjekcije();
        $this->prikaz('brisanje_projekcija',['projekcije'->$projekcije]);
    }
    public function obrisi_projekciju($id){
       $this->db->where('IdP',$id);
       $this->db->delete('Projekcija');
       return redirect()->to(site_url("Admin/brisanje_projekcija"));
    }
    public function prihvati_zahtev(){
        $this->db->where('IdF',$id);
        $this->db->update('Film', ('status'=>'prihvacen'));
        return redirect()->to(site_url("Admin/zahtevi"));
    }
    public function odbij_zahtev(){
        $this->db->where('IdF',$id);
        $this->db->update('Film', ('status'=>'odbijen'));
        return redirect()->to(site_url("Admin/zahtevi"));
    }


}