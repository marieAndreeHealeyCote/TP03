<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Auth;
use App\Models\Log;


class HomeController
{
    public function index()
    {
        //noter dans journal de bord que l'utilisateur a visité cette page
        $log = new Log;
        $x = $log->insert(['username' => Auth::username(), 'page' => '/livres', 'date' => date('Y-m-d H:i:s')]);

        $data = "Bienvenue sur la page d'accueil du site de la Librairie";
        return View::render("home", ['data' => $data]);
    }
}
