<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistropersonaalbergueTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'registropersonaalbergue';

    /**
     * Run the migrations.
     * @table registropersonaalbergue
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idregistroA');
            $table->integer('idAlbergue');
            $table->integer('idJefe');
            $table->integer('idEmergencias');
            $table->string('LugarDeProcedencia', 50);
            $table->dateTime('FechaDeIngreso');
            $table->time('HoraDeIngreso');
            $table->dateTime('FechaDeSalida');
            $table->time('HoraDeSalida');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(["idJefe"], 'idJefe');

            $table->index(["idAlbergue"], 'idAlbergue');

            $table->index(["idEmergencias"], 'idEmergencias');


            $table->foreign('idAlbergue', 'idAlbergue')
                ->references('idAlbergue')->on('albergue')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('idJefe', 'idJefe')
                ->references('IdJefe')->on('jefedefamilia')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('idEmergencias', 'idEmergencias')
                ->references('idEmergencias')->on('emergencia')
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
