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
}
