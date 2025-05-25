<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsMedias extends Model
{
    use HasFactory;
    protected $table = 'teams_medias';
    protected $fillable = ['team_id', 'media_id' ,'name', 'link'];
    public function medias()
    {
        return $this->hasOne(Medias::class, 'id', 'media_id');
    }
}
