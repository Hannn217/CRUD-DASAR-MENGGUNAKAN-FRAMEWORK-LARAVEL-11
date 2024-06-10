<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use App\Models\LikeFoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeFotoController extends Controller
{
    public function store(Request $request){

         //validasi apakah user sudah login atau belum jika belum maka lempar ke halaman login
         if(Auth::check()){
            $data = $request->all();
            $user_id = Auth::user()->id;
            
            $exist = LikeFoto::where('user_id',$user_id)->where('foto_id',$data['foto_id'])->exists();
            if($exist){
                LikeFoto::where('user_id',$user_id)->where('foto_id',$data['foto_id'])->delete();
            } else {
                $data['tanggal_like'] = Carbon::now();
                $data['user_id'] = $user_id ;
                LikeFoto::create($data);  
            }
    
            $url = $request->c_url == 'public'? '/': 'home';
            // $redirectTo = request()->url() == route('home') ? route('home') : '/';
            return redirect($url );
      
        } else {
            return redirect('/login');
        }
     
       
  
    }
}
