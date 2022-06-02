<?php
#Anja Negic 19/676
namespace App\Models;

use CodeIgniter\Model;

class ReziserModel extends Model
{
    protected $table      = 'reziser';
    protected $primaryKey = 'IdUR';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    
}