<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $data = berita::with('user','komentar')->get();
        // return dd($data);
        return view('admin.dashboard',compact('data'));
    }
}
