<?php

namespace App\Controllers;

use App\Providers\View;

class HomeController
{
    public function index()
    {
        $data = "Bienvenue sur la page d'accueil du site de la Librairie";
        return View::render("home", ['data' => $data]);
    }
}
