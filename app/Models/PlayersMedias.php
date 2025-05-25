<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayersMedias extends Model
{
    use HasFactory;
    protected $table = 'players_medias';
    protected $fillable = ['player_id', 'media_id' ,'name', 'link'];
    public function medias()
    {
        return $this->hasOne(Medias::class, 'id', 'media_id');
    }
}
