<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index(){
        $id =  Auth::user()->id;
        $data = berita::where('user_id',$id)->get();
        return view('admin.berita',compact('data'));
    }

    public function store(Request $request){
       $data =  $request->all();

    //    $filename = null;
       $image = $request->file('gambar');

        $path = $image->store('public/images');

        $filename = basename($path);
       
       $data['user_id'] = Auth::user()->id;
       $data['gambar'] = $filename;
       berita::create($data);

       return redirect('/berita');
    }

    public function edit(Request $request, $id){
        $data = $request->all();

        $album = berita::find($id);

        $album->update($data);

        return redirect('/berita');

    }

    public function delete($id){

        $album = berita::find($id);

        $album->delete();

        return redirect('/berita');

    }
}
