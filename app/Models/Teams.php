<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $table = 'teams';
    protected $fillable = ["created_by", 'name', 'game_id'];
    public function games(){
        return $this->belongsTo(Games::class, 'game_id', 'id');
    }

}
