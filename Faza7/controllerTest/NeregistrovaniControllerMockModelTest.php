<?php
namespace App\Controllers;

//use App\Models;
use PHPUnit\Framework\TestCase;
use App\Controllers;
use CodeIgniter\Config\Factories;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PremijereModel;
use App\Models\KorisnikModel;
use App\Models\AdminModel;
use App\Models\GledalacModel;



class NeregistrovaniControllerMockModelTest extends TestCase {
    
    use ControllerTester;
    use DatabaseTestTrait;

    public function setUp() : void {
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
        $gledalac = [
            (object)[
                'IdG' => '1',
            ]
            ];

        $mockkorisnik = $this->createMock(\App\Models\KorisnikModel::class);
        $mockgledalac = $this->createMock(\App\Models\GledalacModel::class);
        $mockadmin = $this->createMock(\App\Models\AdminModel::class);
        $mockpredstavnik = $this->createMock(\App\Models\PredstavnikModel::class);

        /*$mockkorisnik->method("like")->willReturn(
            $korisnici[0]->"";
        );*/

        $mockkorisnik->method("find")->willReturn($korisnik);
        $mockgledalac->method("find")->willReturn($gledalac);


        Factories::injectMock('models', 'App\Models\KorisnikModel', $mockkorisnik);
        Factories::injectMock('models', 'App\Models\GledalacModel', $mockgledalac);
        Factories::injectMock('models', 'App\Models\AdminModel', $mockadmin);
        Factories::injectMock('models', 'App\Models\PredstavnikModel', $mockpredstavnik);
    }

    public function test_loginTest(){
        $results = $this->controller('\App\Controllers\Neregistrovani')->execute('loginSubmit');
        $this->assertTrue($results->see('Žanr'));
    }
}