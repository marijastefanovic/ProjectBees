<?php namespace App\Models;
#Marija Stefanovic 2019/0068

use CodeIgniter\Model;

#model koji se koristi za povezivanje sa tabelom sala u bazi
class SalaModel extends Model
{
        protected $table      = 'Sala';
        protected $primaryKey = 'IdS';
        protected $returnType = 'object';
        
	 #Anja Negic 676/19
        protected $allowedFields = ['Naziv', 'Broj_Mesta'];
       //Natalija Tosic 19/0346
       public function dohvatiSveSale(){
        return $this->select('Sala.IdS')->select('Sala.Naziv')->findAll();
    }
    
}