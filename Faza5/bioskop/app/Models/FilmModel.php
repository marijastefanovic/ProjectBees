<!-- Natalija Tosic 19/0346>
<?php namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
        protected $table      = 'Film';
        protected $primaryKey = 'IdF';
        protected $returnType = 'object';
        protected $allowedFields = ['status']

        public function dohvatiSveZahteve(){
            return $this->where('status','cekanje')->findAll();
        }

        public function dohvatiSveOdobreneFilmove(){
            return $this->where('status','prihvacen')->findAll();
        }
    
}