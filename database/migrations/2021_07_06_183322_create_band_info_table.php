<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_info', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->tinyInteger('area');
            $table->string('band_part', 64);
            $table->tinyInteger('want_part');
            $table->tinyInteger('category');
            $table->tinyInteger('style');
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
        Schema::dropIfExists('band_info');
    }
}
