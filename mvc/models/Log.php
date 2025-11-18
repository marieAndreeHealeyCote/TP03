<?php

namespace App\Models;

use App\Models\CRUD;

class Log extends CRUD
{
    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $fillable = ['page', 'username', 'date'];
}
