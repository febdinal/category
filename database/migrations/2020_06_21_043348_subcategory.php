<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('tablesubcategory', function (Blueprint $table) {
                $table->Increments('id_subcategory');
                $table->string('name');
                $table->integer('parent');
            });
    }
}
