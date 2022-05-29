<?php namespace App\Models;
#Marija Stefanovic 2019/0068
use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom admin u bazi
class AdminModel extends Model
{
        protected $table      = 'Administrator';
        protected $primaryKey = 'IdA';
        protected $returnType = 'object';
        
    
}