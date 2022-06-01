<?php namespace App\Controllers;
// Natalija Tosic 19/0346

class Image extends BaseController
{
    public function index($slika){
        if(($image = file_get_contents(WRITEPATH.'slike\\'.$slika)) === FALSE){
            show_404();
        }

        // choose the right mime type
        $mimeType = 'image/jpg';

        $this->response
            ->setStatusCode(200)
            ->setContentType($mimeType)
            ->setBody($image)
            ->send();

    }
}