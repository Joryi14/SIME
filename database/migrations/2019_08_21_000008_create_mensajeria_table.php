<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'mensajeria';

    /**
     * Run the migrations.
     * @table mensajeria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdMensajeria');
            $table->string('CodigoIncidente', 100);
            $table->string('Descripcion', 100);
            $table->string('Ubicacion', 100);
            $table->time('Hora');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string('Categoria', 100);
            $table->integer('IdLiderComunal');

            $table->index(["IdLiderComunal"], 'Fk_IdLiderComunal');


            $table->foreign('IdLiderComunal', 'Fk_IdLiderComunal')
                ->references('idUsuario')->on('usuario')
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
