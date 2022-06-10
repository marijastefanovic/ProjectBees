<?php

use CodeIgniter\Config\Factories;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\DatabaseTestTrait;
use PHPUnit\Framework\TestCase;
use App\Models;
#Marija Stefanovic 2019/0068
class GledalacControllerTest extends CIUnitTestCase {
    use ControllerTester;
    
    
    protected function setUp(): void
    {
      parent::setUp();
      //'IdF''Naziv','Opis','Duzina', 'Drzava_Godina','Pocetak_prikazivanja','Zanr','Status','Poster','Trejler','IdUG','IdUR','IdPF'
      $filmovi=[
         (object)[
            'IdF'=>0,
            'Naziv'=> "Naziv1",
            'Opis'=> "Opis1",
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

         ],
         (object)[
            'IdF'=>0,
            'Naziv'=> "Naziv2",
            'Opis'=> "Opis2",
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
      $mockfilm=$this->createMock(\App\Models\FilmModel::class);
      $mockfilm->method("findAll")->willReturn($filmovi);
      $mockfilm->method("find",0)->willReturn($filmovi[0]);
      $mockfilm->method("find",1)->willReturn($filmovi[1]);
      Factories::injectMock('models',"App\Models\FilmModel",$mockfilm);
      //'IdP','Datum','Vreme','IdS','IdF','Premijera'
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
      $mockprojekcija=$this->createMock(\App\Models\ProjekcijaModel::class);
      $mockprojekcija->method("findAll")->willReturn($projekcije);
      $mockprojekcija->method("dohvatiProjekcijeFilma")->willReturn($projekcije);
      $mockprojekcija->method("dohvatiPremijereFilma")->willReturn(null);
      Factories::injectMock('models',"App\Models\ProjekcijaModel",$mockprojekcija);

    }
    public function testPocetna(){
       $nesto=$this->controller('\App\Controllers\Gledalac')->execute('pocetna');
       $this->assertTrue($nesto->see('Naslov1'));
       $this->assertTrue($nesto->see('Naslov2'));
      // $this->assertTrue(true);

    }
    public function testLogin(){
        $nesto=$this->controller('\App\Controllers\Gledalac')->execute('login');
        $nesto->assertSee("login");
       // $this->assertTrue(true);
     }
     public function testRegistracija(){
        $nesto=$this->controller('\App\Controllers\Gledalac')->execute('registracija');
        $nesto->assertSee("registracija");
     }
     public function testPretraga(){
        $nesto=$this->controller('\App\Controllers\Gledalac')->execute('pretraga');
        $this->assertTrue($nesto->see(" Nažalost nema takvih filmova."));
     }
     public function testPremijere(){
        $nesto=$this->controller('\App\Controllers\Gledalac')->execute('premijere');
        $this->assertTrue($nesto->see("Nažalost nema projekcija filma za odabrani datum!"));
     }
     
    
     
   
}


?>

