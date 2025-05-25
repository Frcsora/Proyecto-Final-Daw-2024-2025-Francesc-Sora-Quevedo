<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    use hasFactory;
    protected $table = 'socialmedia';
    protected $fillable = ["created_by", 'id_media', 'name', 'link'];
    public function medias(){
        return $this->belongsTo(Medias::class, 'id_media', 'id');
    }
}
