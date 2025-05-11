<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function news()
    {
        return $this->hasManyThrough(News::class, NewsTags::class, 'tag_id', 'id', 'id', 'news_id');
    }

    public function newsTags()
    {
        return $this->hasMany(NewsTags::class, 'tag_id', 'id');
    }
    protected $table = 'tags';
    protected $fillable = ['tag'];
}
