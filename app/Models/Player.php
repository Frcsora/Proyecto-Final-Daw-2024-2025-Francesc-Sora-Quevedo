<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $fillable = ['name', 'surname1', 'surname2', 'nickname', 'image', 'team_id'];
}
