<?php
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use PHPUnit\Framework\TestCase;
use App\Models\ProjekcijaModel;
#Marija Stefanovic 2019/0068
class ProjekcijaModelTest extends TestCase {
    use ControllerTestTrait;
    
    protected $seed = 'Tests\Support\Database\Seeds\ProjekcijaSeeder';

    public function testDohvatiSveProjekcije(){
        $model = new ProjekcijaModel();
	    $objects = $model->dohvatiSveProjekcije();
		$this->assertCount(2, $objects);

    }

    public function testDohvatiZauzeteTermine(){
        $model = new ProjekcijaModel();
	    $objects = $model->dohvatiSveZauzeteTermine(0,'20.2.2000');
		$this->assertCount(0, $objects);
    }

    public function testDohvatiProjekcjeFilma(){
        $model = new ProjekcijaModel();
	    $objects = $model->dohvatiProjekcijeFilma(0);
		$this->assertCount(1, $objects);
    }

    public function testDohvatiProjekcijeFilmaZaDatum(){
        $model = new ProjekcijaModel();
	    $objects = $model->dohvatiProjekcijeFilmaZaDatum('20.2.2000',1);
		$this->assertCount(0, $objects);
    }

    public function testDohvatiPremijereFilma(){
        $model = new ProjekcijaModel();
	    $objects = $model->dohvatiPremijereFilma(1);
		$this->assertCount(0, $objects);
    }
  
}


?>

