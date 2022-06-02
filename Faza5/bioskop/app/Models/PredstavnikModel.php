<?php namespace App\Models;
#Marija Stefanovic 2019/0068
use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom predstavnik u bazi
class PredstavnikModel extends Model
{
        protected $table      = 'predstavnik_filma';
        protected $primaryKey = 'IdPF';
        protected $returnType = 'object';
        protected $allowedFields = ['IdPF','Kompanija'];
    
}