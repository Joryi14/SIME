<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaMenuRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_rol', function (Blueprint $table) {
          
            $table->Integer('IdRol');
            $table->foreign('IdRol','fk_menu_rol')->references('IdRol')->on('roles')->ondelete('restrict')->onupdate('restrict');
            $table->Integer('menu_id');
            $table->foreign('menu_id','fk_menurol_menu')->references('id')->on('menu')->ondelete('restrict')->onupdate('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_rol');
    }
}
