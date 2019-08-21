<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'voluntario';

    /**
     * Run the migrations.
     * @table voluntario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdVoluntario');
            $table->string('NombreVoluntario', 100);
            $table->string('ApellidoVoluntario1', 100);
            $table->string('ApellidoVoluntario2', 100);
            $table->string('CedulaVoluntario', 100)->nullable()->default(null);
            $table->string('TelefonoVoluntario', 100);
            $table->string('NacionalidadVoluntario', 100);
            $table->string('Ocupacion', 100);
            $table->string('Patologia', 100);
            $table->timestamp('Fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
