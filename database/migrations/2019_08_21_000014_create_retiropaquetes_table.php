<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetiropaquetesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'retiropaquetes';

    /**
     * Run the migrations.
     * @table retiropaquetes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdRetiroPaquetes');
            $table->integer('IdChofer');
            $table->integer('IdAdministradorI');
            $table->integer('IdVoluntario');
            $table->integer('PlacaVehiculo');
            $table->string('DireccionAEntregar', 100);
            $table->integer('SuministrosGobierno');
            $table->integer('SuministrosComision');
            $table->integer('IdInventario');
            $table->timestamp('Fecha')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(["IdVoluntario"], 'IdVoluntario');

            $table->index(["IdInventario"], 'IdInventario');

            $table->index(["IdAdministradorI"], 'IdAdministradorI');

            $table->index(["IdChofer"], 'IdChofer');


            $table->foreign('IdChofer', 'IdChofer')
                ->references('IdChofer')->on('chofer')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('IdVoluntario', 'IdVoluntario')
                ->references('idUsuario')->on('usuario')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('IdInventario', 'IdInventario')
                ->references('idInventario')->on('inventario')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('IdAdministradorI', 'IdAdministradorI')
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
