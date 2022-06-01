<?php namespace App\Models;
# Marija Stefanovic 2019/0068
# Ana Stanic 2019/0703
use CodeIgniter\Model;

class GledalacModel extends Model
{
        protected $table      = 'Gledalac';
        protected $primaryKey = 'IdG';
        protected $returnType = 'object';
        protected $allowedFields = ['IdG'];
    
}