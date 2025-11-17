<?php

namespace App\Models;

use App\Models\CRUD;

class Editeur extends CRUD
{
    protected $table = 'editeurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom'];
}
