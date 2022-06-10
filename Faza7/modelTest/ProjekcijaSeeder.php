<?php 
namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

#Marija Stefanovic 2019/0068
class FilmSeeder extends Seeder
{
	
    public function run()
	{

        $projekcije=[
                (object)[
                    'IdP'=>0,
                    "Datum"=>'20.6.2022',
                    'Vreme'=>'18:00',
                    'IdS'=>2,
                    'IdF'=>0,
                    'Premijera'=>0,
                ],
                (object)[
                    'IdP'=>1,
                    "Datum"=>'20.6.2022',
                    'Vreme'=>'22:00',
                    'IdS'=>2,
                    'IdF'=>1,
                    'Premijera'=>0,

                ]
            ];
            $builder = $this->db->table('Projekcija');
            $builder->insert($projekcije);
    }
}
