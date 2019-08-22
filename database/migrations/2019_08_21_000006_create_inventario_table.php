<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'inventario';

    /**
     * Run the migrations.
     * @table inventario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idInventario');
            $table->integer('idEmergencias');
            $table->integer('Suministros');
            $table->integer('Colchonetas');
            $table->integer('Cobijas');
            $table->tinyInteger('Ropa');
            $table->timestamp('Fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(["idEmergencias"], 'idEmergencias');


            $table->foreign('idEmergencias', 'idEmergencias')
                ->references('idEmergencias')->on('emergencia')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
