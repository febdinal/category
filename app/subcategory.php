<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table = 'tablesubcategory';

    protected $fillable = [
        'id_subcategory','name','parent'
    ];
}
