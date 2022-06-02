<?php
#Anja Negic 676/19
namespace App\Models;

use CodeIgniter\Model;

class GlumacModel extends Model
{
    protected $table      = 'glumac';
    protected $primaryKey = 'IdUG';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    
}