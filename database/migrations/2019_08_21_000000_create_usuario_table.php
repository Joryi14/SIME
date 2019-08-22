<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuario';

    /**
     * Run the migrations.
     * @table usuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idUsuario');
            $table->string('Nombre', 50);
            $table->string('Apellido1', 50);
            $table->string('Apellido2', 50);
            $table->string('Cedula', 50);
            $table->string('patologia', 100)->nullable()->default(null);
            $table->string('Nacionalidad', 50)->nullable()->default(null);
            $table->string('Comunidad', 50)->nullable()->default(null);
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
