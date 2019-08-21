<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCensoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'censo';

    /**
     * Run the migrations.
     * @table censo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdCenso');
            $table->integer('IdJefeFam');
            $table->tinyInteger('Refrigerador');
            $table->tinyInteger('Cocina');
            $table->tinyInteger('Colchon');
            $table->tinyInteger('Cama');
            $table->timestamp('Fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(["IdJefeFam"], 'Fk_IdJefeFam');


            $table->foreign('IdJefeFam', 'Fk_IdJefeFam')
                ->references('IdJefe')->on('jefedefamilia')
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
