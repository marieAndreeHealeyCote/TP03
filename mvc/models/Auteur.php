<?php

namespace App\Models;

use App\Models\CRUD;

class Auteur extends CRUD
{
    protected $table = 'auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom'];
}
