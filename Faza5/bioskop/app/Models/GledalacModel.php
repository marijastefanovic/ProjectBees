<?php namespace App\Models;
#Marija Stefanovic 2019/0068
use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom gledalac u bazi
class GledalacModel extends Model
{
        protected $table      = 'Gledalac';
        protected $primaryKey = 'IdG';
        protected $returnType = 'object';
     
    
}