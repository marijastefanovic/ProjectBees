<?php namespace App\Models;
// Natalija Tosic 19/0346>
//Ana Stanic 2019/0703
use CodeIgniter\Model;

class FilmModel extends Model
{
        protected $table      = 'Film';
        protected $primaryKey = 'IdF';
        protected $returnType = 'object';
        protected $allowedFields = ['Naziv','Opis','Duzina', 'Drzava_Godina','Pocetak_prikazivanja','Zanr','Status','Poster','Trejler','IdUG','IdUR','IdPF'];

        public function dohvatiSveZahteve(){
            return $this->join('ucesnik_u_filmu glumac','film.IdUG=glumac.IdU')->join('ucesnik_u_filmu','film.IdUR=ucesnik_u_filmu.IdU')->select('glumac.Ime imeG')->select('glumac.Prezime prezimeG')->select('ucesnik_u_filmu.*')->select('film.*')->where('Status','neresen')->findAll();
        }

        public function dohvatiSveOdobreneFilmove(){
            return $this->where('Status','prihvacen')->findAll();
        }
        
        public function dohvatiFilmPoId($id){
            return $this->where('IdF',$id)->findAll();
        }

        /**
         * Funkcija koja vraća sve filmove sa odgovarajućim IdPF
        */
        public function dohvatiFilmPoIdPF($id){
            return $this->where('IdPF',$id)->findAll();
        }
    
}