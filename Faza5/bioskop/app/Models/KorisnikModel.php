<?php namespace App\Models;
#Marija Stefanovic 2019/0068
use CodeIgniter\Model;

class KorisnikModel extends Model
{
        protected $table      = 'Korisnik';
        protected $primaryKey = 'IdK';
        protected $returnType = 'object';
        protected $allowedFields = ['Mejl', 'Lozinka'];
    
}