<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $table = 'matches';
    protected $primaryKey = 'id';
    protected $fillable = ['date', 'time', 'tournaments_id', 'rival', 'best_of', 'result'];
}
