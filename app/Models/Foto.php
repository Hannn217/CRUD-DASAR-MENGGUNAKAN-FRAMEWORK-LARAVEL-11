<?php

namespace App\Models;

use App\Http\Controllers\KomentarController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    
    protected $table = 'foto';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function komentar()
    {
        return $this->hasMany(KomentarController::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
