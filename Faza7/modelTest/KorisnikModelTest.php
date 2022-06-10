<?php

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\KorisnikSeeder;
use App\Models\KorisnikModel;
//use vendor\codeigniter4\framework\system\Database\SQLite3;

/**
 * @internal
 */
final class KorisnikModelTest extends \CodeIgniter\Test\CIDatabaseTestCase
{
    

    protected $seed = KorisnikSeeder::class;
    protected $basePath = SUPPORTPATH . 'Database/';

    protected function regressDatabase(){
        $sql = file_get_contents($this->basePath.'bioskop.sql');
        $this->db->execute($sql);
    }

    public function testModelDohvatiSaIstimMailom()
    {
        $model = new KorisnikModel();

        // Get every row created by ExampleSeeder
        $objects = $model->dohvatiSaIstimMailom("LazaLazic@gmail.com");

        // Make sure the count is as expected
        $this->assertCount(1, $objects);
    }
}
