<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = ['nome_fantasia', 'setor', 'cnpj'];
}