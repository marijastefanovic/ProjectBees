<?php namespace App\Models;
#Marija Stefanovic 2019/0068

use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom rezervacija u bazi
class RezervacijaModel extends Model
{
        protected $table      = 'Rezervacija';
        protected $primaryKey = 'IdR';
        protected $returnType = 'object';
        protected $allowedFields = ['IdR','Broj_Karata', 'IdP', 'IdG'];
    
}