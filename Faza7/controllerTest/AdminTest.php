<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Apps\Controllers\Admin
use CodeIgniter\Config\Factories;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;

final class AdminTest extends CIUnitTestCase
{
    use ControllerTester;

    
    protected function setup():void{
        parent::setUp();
        $projekcija = [(object)[
            'IdF'=>1,
            'Sala' => "sala 1",
            'Dan' => 'Petak',
            'Vreme' => '10:00',
            'Premijera' => 'false',
           
        ]];
        $mockProjekcija = $this->createMock(App\Models\ProjekcijaModel::class);
        Factories::injectMock('models','App\Models\ProjekcijaModel',$mockfilm);
    }

    public function testZahtevi(){
       $results>$this->controller('App\Controllers\Admin>execute('zahtevi');
    }

    public function testPravljenje_projekcija(){
        $mockfilm = $this->createMock(App\Models\FilmModel::class);
        $mockOdobreniFilmovi->mockFilm("dohvatiSveOdobreneFilmove");
        assertSee('mockOdobreniFilmovi');
    }

    public function testObrisiProjekciju(){
         $mockProjekcija= $this->createMock(App\Models\ProjekcijaModel::class);
        $mockId->mockFilm->id;
        assertSee('mockOdobreniFilmovi');
         Factories::rejectMock('models','App\Models\Film',$mockId);
    }



    public function testPrihvatiZahtev(){
         $mockFilm= $this->createMock(App\Models\ProjekcijaModel::class);
        $mockId->mockFilm->id;
         Factories::injectMock('status','App\Models\Film',$mockId);
    }

  public function testOdbijZahtev(){
         $mockFilm= $this->createMock(App\Models\ProjekcijaModel::class);
        $mockId->mockFilm->id;
         Factories::injectMock('status','App\Models\Film',$mockId);
    }
}