<?php

namespace App\Http\Controllers;

use App\tableBE;
use App\tbcategory;
use App\subcategory;
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
                return '
                        <button onclick="info('."'".$datas->title_product."'".')" class="btn btn-xs btn-primary">Info</button>
                        <button onclick="hapus('.$datas->id.')" class="btn btn-xs btn-danger">Delete</button>
                ';
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
        return response()->json([
            'success' => 'Data Berhasil Ditambahkan!'
        ]);
    }
    public function hapus(request $request)
    {
        if($request->ajax())
        {
            tableBE::where('id',$request->id)->delete();
            echo '<div class="alert" alert-success> Success Delete Data</div>';   
        }
    }
    public function ambilcategory()
    {
        return tbcategory::get()->toJson(); 
    }
    public function ambilsubcategory($id_category)
    {
        return subcategory::where('parent',$id_category)->get()->toJson();
    }
}