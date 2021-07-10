<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_info', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->tinyInteger('gender');
            $table->tinyInteger('part');
            $table->tinyInteger('year');
            $table->tinyInteger('area');
            $table->string('song', 64);
            $table->tinyInteger('category');
            $table->string('introduction', 500);
            $table->timestamps();
            $table->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_info');
    }
}
