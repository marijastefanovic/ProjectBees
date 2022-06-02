<?php namespace App\Models;
// Natalija Tosic 19/0346>
#Anja Negic 19/676
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
	  public function dohvatiProjekcijeFilma($IdF){
            return $this->where('IdF', $IdF)->orderBy('Datum')->groupBy('Datum')->find();
        }
        public function dohvatiProjekcijeFilmaZaDatum($Datum, $IdF){
            $array = array('Datum' => $Datum, 'IdF' => $IdF);
            return $this->where($array)->orderBy('Vreme')->findAll();
        }
        public function dohvatiPremijereFilma($IdF){
            $array = array('IdF' => $IdF, 'Premijera' => 1);
            return $this->where($array)->find();
        }
    
}