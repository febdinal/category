<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tableBE extends Model
{
    protected $table = 'tabelbe';

    protected $fillable = [
        'id','title_product','brands','gender','category','subcategory','keterangan'
    ];
}