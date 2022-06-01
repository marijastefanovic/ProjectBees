<?php namespace App\Controllers;
// Natalija Tosic 19/0346
use App\Models\ProjekcijaModel;
use App\Models\FilmModel;
use App\Models\SalaModel;
use \stdClass;
class Admin extends BaseController
{
    protected function prikaz($page, $data){
        $data['controller']='Admin';
        echo view('sablon/header_admin', $data);
        echo view("stranice/$page", $data);
    }
    public function index(){
        $this->zahtevi();
    }
    //prikazuje sve zahteve tj. filmove koji nisu ni potvrdjeni ni odbijeni
    public function zahtevi(){
        $filmModel = new FilmModel();
        $zahtevi = $filmModel->dohvatiSveZahteve();
        $this->prikaz('zahtevi',['zahtevi'=>$zahtevi]);
    }
    // prikazuje sve filmove koji su odobreni za koje onda moze da se napravi projekcija
    public function pravljenje_projekcija(){
        $filmModel = new FilmModel();
        $odobreniFilmovi = $filmModel->dohvatiSveOdobreneFilmove();
        $this->prikaz('pravljenje_projekcija',['filmovi'=>$odobreniFilmovi]);
    }
    // prikazuje sve projekcije koje onda mogu da se obrisu
    public function brisanje_projekcija(){
        $projekcijeModel = new ProjekcijaModel();
        $projekcije = $projekcijeModel->dohvatiSveProjekcije();
        $this->prikaz('brisanje_projekcija',['projekcije'=>$projekcije]);
    }
    public function obrisi_projekciju(){
        $projekcijaModel = new ProjekcijaModel();
        $id=$_REQUEST['id'];
        $projekcijaModel->where('IdP', $id)->delete();
        return redirect(site_url('Admin/brisanje_projekcija'), 'refresh');
        //return redirect()->to(base_url('Admin/brisanje_projekcija'));
    }
    public function prihvati_zahtev(){
        $filmModel=new FilmModel();
        $id=$_REQUEST['id'];
        $filmModel->update($id, ['Status'=>'prihvacen']);
        return redirect()->to(site_url("Admin/zahtevi"));
    }
    public function odbij_zahtev(){
        $filmModel=new FilmModel();
        $id=$_REQUEST['id'];
        $filmModel->update($id, ['Status'=>'odbijen']);
        return redirect()->to(site_url("Admin/zahtevi"));
    }

    public function napravi_projekciju(){
        $idF= $_REQUEST['izabran'];
        $sala = $_REQUEST['sale'];
        $dan = $_REQUEST['dani'];
        $vreme = $_REQUEST['sati'];
        $projekcijaModel = new ProjekcijaModel();
        $danasnji = $dan - (date('w',strtotime(date("Y/m/d")))-1)%7;
        //$datum = date("Y-m-d");
        $datum = date("Y-m-d", strtotime( date("Y/m/d") ."+".$danasnji." days"));
        $projekcijaModel->insert(['Datum'=>$datum,'Vreme'=>$vreme,'IdF'=>$idF,'IdS'=>$sala]);
        return redirect()->to(site_url("Admin/pravljenje_projekcija"));
    }

    public function pronadji_slobodne_termine(){
        $id = $_REQUEST['id'];
        $projekcijaModel = new ProjekcijaModel();
        $salaModel = new SalaModel();
        $filmModel = new FilmModel();
        $film=$filmModel->dohvatiFilmPoId($id)[0];
        $sale = $salaModel->dohvatiSveSale();
        $termini = array();
        $dayofweek = (date('w', strtotime(date("Y/m/d")))-1)%7;
        $vremena = ['10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00'];
        $prethodno_vreme = '00:00';
        foreach ($sale as $sala){
            for($i=0;$i<7;$i++){
                if($i-$dayofweek>=0){
                    $rezultat=$projekcijaModel->dohvatiZauzeteTermine($sala->IdS,date('Y-m-d', strtotime(date("Y/m/d"). ' + '.($i-$dayofweek).' days')));
                    $rez = new  stdClass();
                    $j =0;
                    if($j >= count($rezultat)){
                        $rez->Vreme="22:00";
                        $rez->Duzina = "200";
                    } else{
                        $rez = $rezultat[$j];
                    }
                    foreach($vremena as $termin){
                        if(count($rezultat)>0){
                            $temp = date("H:i",strtotime( $termin." + $film->Duzina minutes"));
                            if(date("H:i", strtotime($rez->Vreme. ' + '.$rez->Duzina.' minutes'))<=date("H:i",strtotime($termin))){
                            // $prethodno_vreme = date("H:i", strtotime($rez->Vreme. ' + '.$rez->Duzina.' minutes'));
                                $j = $j +1;
                                if($j>= count($rezultat)){
                                    $rez->Vreme = "23:59";
                                    $rez->Duzina ="0";
                                } else{
                                    $rez = $rezultat[$j];
                                }

                            }
                            if($temp <= date("H:i",strtotime( $rez->Vreme))){
                                array_push($termini,['sala'=>$sala,'dan'=>$i,'termin'=>date("H:i",strtotime($termin))]);
                            } 
                    } else{
                        array_push($termini,['sala'=>$sala,'dan'=>$i,'termin'=>date("H:i",strtotime($termin))]);
                    }
                    }
                }
            }
        }
        echo json_encode($termini);
        //return $termini;
    }
    public function logout(){
        $this->session->set('ulogovan',false);
        $this->session->set('IdK',-1);
        return redirect()->to(site_url("Neregistrovani"));
    }
}