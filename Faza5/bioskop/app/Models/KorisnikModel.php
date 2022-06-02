<?php namespace App\Models;
# Marija Stefanovic 2019/0068>
# Ana Stanic 0703/2019
use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom korisnik u bazi
class KorisnikModel extends Model
{
        protected $table      = 'Korisnik';
        protected $primaryKey = 'IdK';
        protected $returnType = 'object';
        protected $allowedFields = ['Ime','Prezime','Mejl', 'Lozinka'];
    
}