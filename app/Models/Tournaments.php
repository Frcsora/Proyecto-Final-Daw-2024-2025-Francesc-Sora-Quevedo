<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournaments extends Model
{
    protected $table = 'tournaments';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'team_id', 'event', 'date', 'time', 'result'];
}
