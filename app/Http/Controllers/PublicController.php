<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(){
        $data = Komentar::with('komentar.user','like','user')->get();

        return view('public.index',compact('data'));
    }
}
