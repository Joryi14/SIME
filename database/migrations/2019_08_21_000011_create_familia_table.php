<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'familia';

    /**
     * Run the migrations.
     * @table familia
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdFamilia');
            $table->integer('IdJefeF');
            $table->string('Nombre', 100);
            $table->string('Apellido1', 100);
            $table->string('Apellido2', 100);
            $table->string('Cedula', 100)->nullable()->default(null);
            $table->string('Parentesco', 100);
            $table->integer('Edad');
            $table->string('sexo', 100);
            $table->string('PcD', 100);
            $table->string('MG', 100);
            $table->string('PI', 100);
            $table->string('PM', 100);
            $table->string('Patologia', 200);

            $table->index(["IdJefeF"], 'Fk_IdJefeF');


            $table->foreign('IdJefeF', 'Fk_IdJefeF')
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
