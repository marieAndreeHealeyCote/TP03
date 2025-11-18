<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Auth;
use App\Providers\Validator;
use App\Models\Log;
use App\Models\Upload;

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
    // public function update($data = [], $get = [], $files = [])
    // {
    //     Auth::session();

    //     $validator = new Validator;
    //     $validator->field('titre', $data['titre'])->required()->max(100);
    //     $validator->field('contenu', $data['contenu'])->required()->max(500);
    //     $validator->field('path_img', $data['path_img'])->required()->max(255);
    //     $validator->field('alt_text', $data['alt_text'])->required()->max(255);

    //     if ($validator->isSuccess()) {
    //         $file = new File;
    //         $insert = $file->update($data, $get['id']);
    //         if ($insert) {
    //             return View::redirect('livre/show?id=' . $get['id']);
    //         } else {
    //             return View::render('error');
    //         }
    //     } else {
    //         $errors = $validator->getErrors();
    //         $inputs = $data;

    //         //récupérer à nouveau les listes pour les Select
    //         $auteur = new Auteur;
    //         $listeAuteurs = $auteur->select();

    //         $categorie = new Categorie;
    //         $listeCategories = $categorie->select();

    //         $editeur = new Editeur;
    //         $listeEditeurs = $editeur->select();

    //         return View::render('livre/create', [
    //             'errors' => $errors,
    //             'inputs' => $inputs,
    //             'listeAuteurs' => $listeAuteurs,
    //             'listeCategories' => $listeCategories,
    //             'listeEditeurs' => $listeEditeurs,
    //         ]);
    //     }
    //     return View::render('error');
    // }
}
