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
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('part')->nullable();
            $table->tinyInteger('year')->nullable();
            $table->tinyInteger('area')->nullable();
            $table->string('song', 64)->nullable();
            $table->tinyInteger('category')->nullable();
            $table->string('introduction', 500)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));


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
