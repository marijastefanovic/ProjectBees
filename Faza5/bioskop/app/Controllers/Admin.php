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
    <!-- prikazuje sve zahteve tj. filmove koji nisu ni potvrdjeni ni odbijeni-->
    protected function zahtevi(){
        $filmModel = new FilmModel();
        $zahtevi = $filmModel->dohvatiSveZahteve();
        $this->prikaz('zahtevi',['zahtevi'->$zahtevi]);
    }
    <!-- prikazuje sve filmove koji su odobreni za koje onda moze da se napravi projekcija-->
    protected function pravljenje_projekcija(){
        $filmModel = new FilmModel();
        $odobreniFilmovi = $filmModel->dohvatiSveOdobreneFilmove();
        $this->prikaz('pravljenje_projekcija',['filmovi'->$odobreniFilmovi]);
    }
    <!-- prikazuje sve projekcije koje onda mogu da se obrisu-->
    protected function brisanje_projekcija(){
        $projekcijeModel = new ProjekcijaModel();
        $projekcije = $projekcijeModel->dohvatiSveProjekcije();
        $this->prikaz('brisanje_projekcija',['projekcije'->$projekcije]);
    }

}