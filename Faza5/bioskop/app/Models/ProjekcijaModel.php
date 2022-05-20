<!-- Natalija Tosic 19/0346>
<?php namespace App\Models;

use CodeIgniter\Model;

class ProjekcijaModel extends Model
{
        protected $table      = 'Projekcija';
        protected $primaryKey = 'IdP';
        protected $returnType = 'object';

        public function dohvatiSveProjekcije(){
            return $this->findAll();
        }
    
}