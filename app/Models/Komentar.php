<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function berita(){
        return $this->belongsTo(berita::class,'berita_id');
    }
}