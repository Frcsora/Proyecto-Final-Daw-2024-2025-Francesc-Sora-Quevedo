<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $table = 'sponsors';
    protected $fillable = ['created_by','name','link', 'tier', 'base64'];
    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
