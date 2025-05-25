<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $fillable = ["created_by", 'name', 'game_id'];
    public function games(){
        return $this->belongsTo(Games::class, 'game_id', 'id');
    }
    public function tournaments(){
        return $this->hasMany(Tournaments::class, 'team_id', 'id');
    }
}
