<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index(){
        $id =  Auth::user()->id;
        $data = Album::where('user_id',$id)->get();
        return view('admin.album',compact('data'));
    }

    public function store(Request $request){
       $data =  $request->all();
       if($request->file('image')){
        $image = $request->file('image');

        $path = $image->store('public/images');

        $filename = basename($path);
    }

       $data['tanggal_dibuat'] = Carbon::now();
       $data['user_id'] = Auth::user()->id;
       $data['user_id'] = A;
       Album::create($data);

       return redirect('/album');
    }

    public function edit(Request $request, $id){
        $data = $request->all();

        $album = Album::find($id);

        $album->update($data);

        return redirect('/album');

    }

    public function delete($id){

        $album = Album::find($id);

        $album->delete();

        return redirect('/album');

    }
}
