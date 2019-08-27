<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntariowebTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'voluntarioweb';

    /**
     * Run the migrations.
     * @table voluntarioweb
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdVoluntarioWeb');
            $table->string('NombreVoluntarioWeb', 100);
            $table->string('ApellidoVoluntario1Web', 100);
            $table->string('ApellidoVoluntario2Web', 100);
            $table->string('CedulaVoluntarioWeb', 100)->nullable()->default(null);
            $table->string('TelefonoVoluntarioWeb', 100);
            $table->string('NacionalidadVoluntarioWeb', 100);
            $table->string('OcupacionWeb', 100);
            $table->string('PatologiaWeb', 100);
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
