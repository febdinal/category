<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelBE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabelBE', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title_product');
            $table->string('brands');
            $table->string('gender');
            $table->string('category');
            $table->string('subcategory');
            $table->string('keterangan'); 
           
        });
    }
}
