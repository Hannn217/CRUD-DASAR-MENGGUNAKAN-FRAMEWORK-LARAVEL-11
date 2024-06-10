<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    
}
