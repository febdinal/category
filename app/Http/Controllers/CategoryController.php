<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function inputp(Request $request)
    {
        $Formulir = Formulir::create([
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
            'tlp_toko' => $request->tlp_toko,
            'pemilik_toko' => $request->pemilik_toko,
            'edit' => $request->edit,
            'hapus' => $request->hapus,
        
        
        ]);
       

        return redirect(route(''));
    }

    public function index()
    {
        return view('category');
    }

}
