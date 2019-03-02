<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idstatuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('househelp_id');
            $table->string('name')->nullable();//yes/no
            $table->string('id_number')->nullable();
            $table->string('ref_number')->nullable();
            $table->timestamps();;
            $table->softDeletes();

            $table->foreign('househelp_id')->references('id')->on('househelps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idstatuses');
    }
}
