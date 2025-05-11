<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTags extends Model
{
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }

    public function tags()
    {
        return $this->belongsTo(Tags::class, 'tag_id', 'id');
    }
    protected $table = 'news_tags';
    protected $fillable = ['news_id', 'tag_id'];
}
