<?php

use PHPUnit\Framework\TestCase;
use Apps\Controllers\Predstavnik;
use CodeIgniter\Config\Factories;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;

class NeregistrovaniLogAdmin extends TestCase{
    use ControllerTester;

    
    protected function setup():void{
        parent::setUp();


        $mejl = 'anjanegic1@gmail.com';
        $lozinka = 'anja';
        $korisnik = [
            (object)[
                'IdK' => '1',
                'Ime' => 'Anja',
                'Prezime' => 'Negic',
                'Mejl' => 'anjanegic1@gmail.com',
                'Lozinka' => 'anjanegic',
            ]
        ];
        $admin = [
            (object)[
                'IdA' => '1',
            ]
        ];

        $mockKorisnici = $this->createMock(App\Models\KorisnikModel::class);
        $mockKorisnici->method("find")->willReturn($korisnik);
        Factories::injectMock('models','App\Models\KorisnikModel',$mockUcesnici);

        $mockAdmin = $this->createMock(App\Models\AdminModel::class);
        Factories::injectMock('models','App\Models\AdminModel',$mockAdmin);

    }


    public function testLoginAdmina(){
       $results=$this->controller('App\Controllers\Neregistrovani')->execute('loginSubmit');
       $results->assertSee('Ne postoji nijedan nerešen zahtev trenutno.');
    }
}