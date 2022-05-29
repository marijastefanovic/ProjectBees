<?php namespace App\Models;
#Marija Stefanovic 2019/0068

use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom sala u bazi
class SalaModel extends Model
{
        protected $table      = 'Sala';
        protected $primaryKey = 'IdS';
        protected $returnType = 'object';
       
    
}