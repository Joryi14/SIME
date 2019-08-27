<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'chofer';

    /**
     * Run the migrations.
     * @table chofer
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdChofer');
            $table->string('Nombre', 25);
            $table->string('Apellido1', 25);
            $table->string('Apellido2', 25);
            $table->string('Cedula', 20);
            $table->string('Telefono', 20);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
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
