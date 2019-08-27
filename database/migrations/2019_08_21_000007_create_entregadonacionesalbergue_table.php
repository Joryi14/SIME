<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregadonacionesalbergueTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'entregadonacionesalbergue';

    /**
     * Run the migrations.
     * @table entregadonacionesalbergue
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdEntregaA');
            $table->integer('IdJefeFa');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(["IdJefeFa"], 'Fk_IdJefeFa');


            $table->foreign('IdJefeFa', 'Fk_IdJefeFa')
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
