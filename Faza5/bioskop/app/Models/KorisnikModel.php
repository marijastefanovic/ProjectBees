<!-- Marija Stefanovic 2019/0068>
<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
        protected $table      = 'Korisnik';
        protected $primaryKey = 'IdK';
        protected $returnType = 'object';
        protected $allowedFields = ['Mejl', 'Lozinka'];
    
}