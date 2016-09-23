<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celular extends Model {

    protected $table = 'celular';
    protected $fillable=['descripcion'];
}