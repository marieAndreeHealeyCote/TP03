<?php

namespace App\Models;

use App\Models\CRUD;
use App\Providers\View;
use App\Providers\Auth;
use App\Models\Log;

class Upload extends CRUD
{

    public const TARGET_DIR = "uploads/";

    public function edit($data = [])
    {
        Auth::session();
        Auth::privilege(1);

        //noter dans journal de bord que l'utilisateur a visité cette page
        $log = new Log;
        $log->insert(['username' => Auth::username(), 'page' => '/upload/edit', 'date' => date('Y-m-d H:i:s')]);

        if (isset($data['id']) && $data['id'] != null) {
            $file = new Upload;
            $selectFile = $file->selectId($data['id']);
            if ($selectFile) {

                $auteur = new Auteur;
                $listeAuteurs = $auteur->select();

                $categorie = new Categorie;
                $listeCategories = $categorie->select();

                $editeur = new Editeur;
                $listeEditeurs = $editeur->select();

                return View::render("livre/edit", [
                    'inputs' => $selectFile,
                    'listeAuteurs' => $listeAuteurs,
                    'listeCategories' => $listeCategories,
                    'listeEditeurs' => $listeEditeurs,
                ]);
            } else {
                return View::render('error', ['msg' => 'Livre not found!']);
            }
        } else {
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }
}
