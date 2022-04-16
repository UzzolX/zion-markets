<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pie_charts', function (Blueprint $table) {
            $table->id();
            $table->string('bar_name')->nullable();
            $table->string('labels_1')->nullable();
            $table->string('label_1')->nullable();
            $table->integer('data_1')->nullable();
            $table->string('labels_2')->nullable();
            $table->string('label_2')->nullable();
            $table->integer('data_2')->nullable();
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
        Schema::dropIfExists('pie_charts');
    }
};
