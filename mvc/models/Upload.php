<?php

namespace App\Models;

use App\Models\CRUD;

use App\Controllers\UploadController;

class Upload extends CRUD
{

    protected $table = "page";
    protected $primaryKey = "id";
    protected $fillable = ['titre', 'contenu', 'path_img', 'alt_text'];

    public function upload()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $controller = new UploadController();


        if ($uri === '/upload' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->upload();
        } elseif ($uri === '/upload') {
            $controller->form();
        } else {
            echo "Page introuvable.";
        }
    }
}
