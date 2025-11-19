<?php

namespace App\Models;

use App\Models\CRUD;

class Livre extends CRUD
{
    protected $table = 'livres';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'annee_publication', 'categorie_id', 'editeur_id', 'auteur_id', 'upload'];
}
