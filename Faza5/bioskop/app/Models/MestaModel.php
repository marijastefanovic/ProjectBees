<?php namespace App\Models;
#Marija Stefanovic 2019/0068

use CodeIgniter\Model;
#model koji se koristi za povezivanje sa tabelom mesto u bazi
class MestaModel extends Model
{
        protected $table      = 'Mesto';
        protected $primaryKey = 'IdM';
        protected $returnType = 'object';
        protected $allowedFields = ['Red','Mesto','IdS','IdR'];
    
}