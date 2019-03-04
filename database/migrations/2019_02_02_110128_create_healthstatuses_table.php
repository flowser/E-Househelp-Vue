<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthstatuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('househelp_id');
            $table->string('status')->nullable(); //HIV, ellergy, anyother
            $table->string('specify')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('healthstatuses');
    }
}
