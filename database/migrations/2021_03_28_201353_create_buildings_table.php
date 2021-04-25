<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('bu_name');
            $table->integer('user_id');
            $table->integer('bu_price');
            $table->string('bu_rent');
            $table->string('bu_square');
            $table->string('bu_type');
            $table->string('bu_small_disc');
            $table->string('bu_meta');
            $table->string('bu_langtuide');
            $table->string('bu_latitude');
            $table->text('bu_large_disc');
            $table->text('bu_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
