<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbcategory extends Model
{
    protected $table = 'tablecategory';

    protected $fillable = [
        'id_category','name'
    ];

}
   