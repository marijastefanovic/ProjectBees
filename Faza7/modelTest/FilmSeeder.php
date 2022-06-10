<?php 
namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;
#Marija Stefanovic 2019/0068

class FilmSeeder extends Seeder
{
	
    public function run()
	{
        $filmovi=[
            (object)[
               'IdF'=>0,
               'Naziv'=> "Naziv1",
               'Opis'=> "Opis1",
               'Duzina'=> "100",
               'Drzava_Godina'=> "USA 2000",
               'Pocetak_prikazivanja'=>"15.03.2000" ,
               'Zanr'=> "Akcija",
               'Status'=> "0",
               'Poster'=> '',
               'Trejler'=> '',
               'IdUG'=> 1,
               'IdUR'=> 2,
               'IdPF'=>0
   
            ],
            (object)[
               'IdF'=>1,
               'Naziv'=> "Naziv2",
               'Opis'=> "Opis2",
               'Duzina'=> "100",
               'Drzava_Godina'=> "USA 2000",
               'Pocetak_prikazivanja'=>"15.03.2000" ,
               'Zanr'=> "Akcija",
               'Status'=> "0",
               'Poster'=> '',
               'Trejler'=> '',
               'IdUG'=> 1,
               'IdUR'=> 2,
               'IdPF'=>0
            ],
            (object)[
                'IdF'=>2,
                'Naziv'=> "Naziv3",
                'Opis'=> "Opis3",
                'Duzina'=> "100",
                'Drzava_Godina'=> "USA 2000",
                'Pocetak_prikazivanja'=>"15.03.2000" ,
                'Zanr'=> "Akcija",
                'Status'=> "prihvacen",
                'Poster'=> '',
                'Trejler'=> '',
                'IdUG'=> 1,
                'IdUR'=> 2,
                'IdPF'=>0
             ]
   
         ];

         $builder = $this->db->table('Film');
         $builder->insert($filmovi);
    }

}

?>

