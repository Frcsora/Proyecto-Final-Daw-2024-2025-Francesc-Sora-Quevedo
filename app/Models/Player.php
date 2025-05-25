<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $table = 'players';
    protected $fillable = ["created_by", 'name', 'surname1', 'surname2', 'nickname', 'image', 'team_id'];
}
