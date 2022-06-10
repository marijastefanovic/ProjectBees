<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Apps\Controllers\Predstavnik;
use CodeIgniter\Config\Factories;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;

final class PredstavnikTest extends CIUnitTestCase
{
    use ControllerTester;

    
    protected function setup():void{
        parent::setUp();
        $glumac = [(object)[
            'IdG'
        ]];
        $film = [(object)[
            'IdF'=>0,
            'Naziv' => "film",
            'Opis' => 'opis',
            'Duzina' => '100',
            'Drzava_Godina' => 'Francuska 2022',
            'Pocetak_Prikazivanja' => date("y-m-d"),
            'Zanr' => 'akcija',
            'Status' => 'neresen',
            'Poster' => '',
            'Trejler' => '',
            'IdUG' => 1,
            'IdUR' => 1,
            'IdP' => 1
        ]];
        $mockfilm = $this->createMock(App\Models\FilmModel::class);
        $mockfilm->method("dohvatiFilmPoIdPF")->willReturn($film);
        Factories::injectMock('models','App\Models\FilmModel',$mockfilm);

        $ucesnici = [(object)[
            'IdU'=>1,
            'Ime' => 'Pera',
            'Prezime' => 'Peric'
        ]];
        $mockUcesnici = $this->createMock(App\Models\UcesnikUFilmuModel::class);
        $mockUcesnici->method("findAll")->willReturn($ucesnici);
        Factories::injectMock('models','App\Models\UcesnikUFilmuModel',$mockUcesnici);
        $mockReziser = $this->createMock(App\Models\ReziserModel::class);
        Factories::injectMock('models','App\Models\ReziserModel',$mockReziser);
        $mockGlumac = $this->createMock(App\Models\GlumacModel::class);
        Factories::injectMock('models','App\Models\GlumacModel',$mockGlumac);
    }

    public function testpregledZahteva(){
       $results=$this->controller('App\Controllers\Predstavnik')->execute('pregledZahteva',1);
       $results->assertSee('Pregled zahteva:');
       $results->assertSee('film');
       $results->assertSee('opis');
       $results->assertSee('100');
       $results->assertSee('neresen');
       $results->assertSee('akcija');
    }

    public function testPrikazSlanjaZahteva(){
        $results = $this->controller('App\Controllers\Predstavnik')->execute('prikazSlanjaZahteva');
        $results->assertSee('ZAHTEV:');
    }

    public function testposaljiZahtev(){
        $results = $this->controller('App\Controllers\Predstavnik')->execute('posaljiZahtev');
        $results->assertSee('Pregled zahteva:');
        $results->assertSee('film');
        $results->assertSee('opis');
        $results->assertSee('100');
        $results->assertSee('neresen');
        $results->assertSee('akcija');
    }
}