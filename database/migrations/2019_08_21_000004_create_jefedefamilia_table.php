<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJefedefamiliaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'jefedefamilia';

    /**
     * Run the migrations.
     * @table jefedefamilia
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdJefe');
            $table->integer('TotalPersonas');
            $table->string('Nombre', 100);
            $table->string('Apellido1', 100);
            $table->string('Apellido2', 100);
            $table->string('Cedula', 100)->nullable()->default(null);
            $table->integer('Edad');
            $table->string('sexo', 100);
            $table->string('Telefono', 100)->nullable()->default(null);
            $table->string('PcD', 100);
            $table->string('MG', 100);
            $table->string('PI', 100);
            $table->string('PM', 100);
            $table->string('Patologia', 200);
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
