<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbergueTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'albergue';

    /**
     * Run the migrations.
     * @table albergue
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idAlbergue');
            $table->string('Nombre', 20);
            $table->string('Distrito', 50);
            $table->string('Comunidad', 50);
            $table->string('TipoDeInstalacion', 50);
            $table->integer('Capacidad');
            $table->integer('IdResponsable');
            $table->string('telefono', 10);
            $table->tinyInteger('Duchas');
            $table->tinyInteger('inodoros');
            $table->tinyInteger('EspaciosDeCocina');
            $table->tinyInteger('Bodega');
            $table->string('Longitud', 50);
            $table->string('Latitud', 50);
            $table->string('Nececidades', 50)->nullable()->default(null);
            $table->timestamp('Fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(["IdResponsable"], 'IdResponsable');


            $table->foreign('IdResponsable', 'IdResponsable')
                ->references('IdLiderComunal')->on('lidercomunal')
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
