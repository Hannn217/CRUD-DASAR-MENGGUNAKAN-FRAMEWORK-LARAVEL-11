<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Carbon\Carbon;
use App\Models\KomentarFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request){

        //validasi apakah user sudah login atau belum jika belum maka lempar ke halaman login
       
            $data = $request->all();
            $data['user_id'] =  Auth::user()->id;
            Komentar::create($data);  
            // $redirectTo = request()->url() == route('home') ? route('home') : '/';
            return redirect('/home');
     
    }
}
