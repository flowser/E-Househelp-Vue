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
            $table->string('status')->nullable();//yes/no but waiting card/ no nothing at all
            $table->string('id_number')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('id_photo_front', 120)->nullable();
            $table->string('id_photo_back', 120)->nullable();
            $table->timestamps();;
            $table->softDeletes();

            $table->foreign('househelp_id')->references('id')->on('bureau_househelp')->onDelete('cascade');
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
