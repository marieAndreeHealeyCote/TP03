<?php

namespace App\Controllers;

use App\Providers\View;

class HomeController
{
    public function index()
    {
        $data = "Bienvenue sur HOMEPAGE!";
        return View::render("home", ['data' => $data]);
    }
}
