<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medias extends Model
{
    protected $table = 'medias';
    protected $fillable = ['name','svg'];
}
