<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregadonacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'entregadonaciones';

    /**
     * Run the migrations.
     * @table entregadonaciones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdEntrega');
            $table->integer('IdVoluntario');
            $table->integer('IdJefe');
            $table->integer('IdRetiroPaquetes');
            $table->binary('Foto')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(["IdVoluntario"], 'IdVoluntario');

            $table->index(["IdJefe"], 'IdJefe');

            $table->index(["IdRetiroPaquetes"], 'IdRetiroPaquetes');


            $table->foreign('IdJefe', 'IdJefe')
                ->references('IdJefe')->on('jefedefamilia')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('IdRetiroPaquetes', 'IdRetiroPaquetes')
                ->references('IdRetiroPaquetes')->on('retiropaquetes')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('IdVoluntario', 'IdVoluntario')
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
