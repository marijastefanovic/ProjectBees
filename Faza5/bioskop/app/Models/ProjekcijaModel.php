<?php namespace App\Models;
// Natalija Tosic 19/0346>
use CodeIgniter\Model;

class ProjekcijaModel extends Model
{
        protected $table      = 'Projekcija';
        protected $primaryKey = 'IdP';
        protected $returnType = 'object';
        protected $allowedFields = ['Datum','Vreme','IdS','IdF','Premijera'];

        public function dohvatiSveProjekcije(){
            return $this->join('film','projekcija.IdF=film.IdF')->join('sala','projekcija.IdS=sala.IdS')->select('film.Naziv')->select('film.Poster')->select('sala.Naziv nazivSale')->select('Projekcija.*')->findAll();
        }
        public function dohvatiZauzeteTermine($sala, $dan){
            return $this->join('film','projekcija.IdF=film.IdF')->join('sala','projekcija.IdS=sala.IdS')->select('Projekcija.Vreme')->select('Film.Duzina')->where('Projekcija.Datum',$dan)->where('Sala.IdS',$sala)->orderBy('Projekcija.Vreme','asc')->findAll();
        }
    
}