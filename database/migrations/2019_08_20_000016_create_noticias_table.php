<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'noticias';

    /**
     * Run the migrations.
     * @table noticias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('IdNoticias');
            $table->dateTime('FechaPublicacion');
            $table->string('Titulo', 100);
            $table->integer('IdAutor');
            $table->binary('Imagenes')->nullable()->default(null);
            $table->binary('Videos')->nullable()->default(null);
            $table->string('Articulo');
            $table->binary('PDF')->nullable()->default(null);

            $table->index(["IdAutor"], 'IdAutor');


            $table->foreign('IdAutor', 'IdAutor')
                ->references('idAutor')->on('autor')
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
