<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function tags()
    {
        return $this->hasManyThrough(Tags::class, NewsTags::class, 'news_id', 'id', 'id', 'tag_id');
    }

    public function newsTags()
    {
        return $this->hasMany(NewsTags::class, 'news_id', 'id');
    }

    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['created_by', 'image', 'title', 'abstract','text'];
}
