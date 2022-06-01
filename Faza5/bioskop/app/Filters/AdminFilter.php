<?php
//Natalija Tosic 19/0346
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\AdminModel;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session =session();
        $ulogovan = false;
        if($session->has('ulogovan')){
            if($session->has('IdK')){
                $adminModel = new AdminModel();
                $admini = $adminModel->dohvatiAdmine();
                for($i=0;$i<count($admini);$i++){
                    if($admini[$i]->IdA==$session->get('IdK')){
                        $ulogovan = true;
                        break;
                    }
                }
            }
            if(!$ulogovan){
                return redirect()->to(site_url("Neregistrovani"));
            }
        } else{
            return redirect()->to(site_url("Neregistrovani"));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}