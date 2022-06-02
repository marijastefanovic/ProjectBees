<?php
#Anja Negic 676/19
namespace App\Models;

use CodeIgniter\Model;

class UcesnikUFilmuModel extends Model
{
    protected $table      = 'ucesnik_u_filmu';
    protected $primaryKey = 'IdU';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['Ime', 'Prezime'];

    
}