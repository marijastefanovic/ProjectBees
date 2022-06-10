<?php
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use PHPUnit\Framework\TestCase;
use App\Models\FilmModel;
#Marija Stefanovic 2019/0068
class FilmModelTest extends CIDatabaseTestCase {
    use ControllerTestTrait;
    

    protected $seed = Tests\Support\Database\Seeds\FilmSeeder::class;
    protected $basePath = SUPPORTPATH . 'Database/';

    protected function regressDatabase(){
        $sql = file_get_contents($this->basePath.'bioskop.sql');
        $this->db->query($sql);
    }

	public function testDohvatiSveZahteve()

	{
		$model = new FilmModel();

		
		
	    $objects = $model->dohvatiSveZahteve();

		
		
		$this->assertCount(3, $objects);

	}

    public function testDohvatiSveOdobreneFilmove(){
        $model = new FilmModel();

		
		
	    $objects = $model->dohvatiSveOdobreneFilmove();

		
		
		$this->assertCount(2, $objects);
    }
    public function dohvatiFilmPoId(){
        $model = new FilmModel();

		
		
	    $objects = $model->dohvatiFilmPoId(1);

		
		
		$this->assertCount(1, $objects);
    }
    public function testFilmPoIdPF(){
        $model = new FilmModel();

		
		
	    $objects = $model->dohvatiFilmPoIdPF(0);

		
		
		$this->assertCount(1, $objects);
    }


    
 
}



?>

