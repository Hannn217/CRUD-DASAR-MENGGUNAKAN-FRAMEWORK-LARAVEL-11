<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function index()
    {
        $id =  Auth::user()->id;
        $data = Foto::where('user_id', $id)->get();
        return view('admin.foto',compact('data'));
    }

    public function store(Request $request)
    {
        //harus kasih perintah cmd "php artisan storage:link"
        if($request->file('image')){
            $image = $request->file('image');

            $path = $image->store('public/images');
    
            $filename = basename($path);
        }
        $data = $request->all();
        $data['tanggal_unggah'] = Carbon::now();
        $data['user_id'] =  Auth::user()->id;
        $data['lokasi_file'] = $filename; 
        Foto::create($data);

   
        return redirect('/foto');
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();

        $Foto = Foto::find($id);

        $image = $request->file('image');

        $path = $image->store('public/images');

        $filename = basename($path);
        $data['lokasi_file'] = $filename; 

        $Foto->update($data);

        return redirect('/foto');
    }

    public function delete($id)
    {

        $Foto = Foto::find($id);

        $Foto->delete();

        return redirect('/foto');
    }
}
