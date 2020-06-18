<?php

namespace App\Http\Controllers;

use App\tableBE;
use DataTables;
use Illuminate\Http\Request;

class BEController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function showData()
    {
        $datas = tableBE::all();
        return DataTables::of($datas)
            ->addColumn('action', function($datas) {
                return '<button class="btn btn-danger"> Hapus </button>';
            })
            ->make(true);
    }

    public function newproduk(Request $request)
    {
        $tabelBE = tableBE::create([
            'title_product' => $request->title_product,
            'brands' => $request->brands,
            'gender' => $request->gender,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/produk/ajax');
     
    }
    public function hapus($id)
    {
        tabelBE::find($id)->delete();
    
        return redirect(('/produk'));
    }
}
