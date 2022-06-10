<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

//ovo ide u tests/_support/Database/Seeds
//a skript za bazu ide u tests/_support/Database

class KorisnikSeeder extends Seeder
{
    public function run()
    {
        $korisnici = [
            [
                'IdK'    => 1,
                'Ime'     => 'PEra',
                'Prezime'   => 'Peric',
                'Mejl'    => 'pera123@gmail.com',
                'Lozinka' => 'PeraJeNajbolji',
            ],
            [
                'IdK'    => 2,
                'Ime'     => 'Mika',
                'Prezime'   => 'Mikic',
                'Mejl'    => 'Mika00@gmail.com',
                'Lozinka' => 'Mika123',
            ],
            [
                'IdK'    => 3,
                'Ime'     => 'Laza',
                'Prezime'   => 'Lazic',
                'Mejl'    => 'LazaLazic@gmail.com',
                'Lozinka' => 'Lazic321',
            ],
        ];

        $builder = $this->db->table('Korisnik');

        foreach ($korisnici as $korisnik) {
            $builder->insert($korisnik);
        }
    }
}
