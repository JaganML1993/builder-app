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
        Schema::create('searches', function (Blueprint $table) {
            $table->id();
            $table->string('icnumber')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('total_board_of_meeting')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('company_name1')->nullable();
            $table->string('activities1')->nullable();
            $table->string('company_name2')->nullable();
            $table->string('activities2')->nullable();
            $table->string('company_name3')->nullable();
            $table->string('activities3')->nullable();
            $table->string('company_name4')->nullable();
            $table->string('activities4')->nullable();
            $table->string('company_name5')->nullable();
            $table->string('activities5')->nullable();
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
        Schema::dropIfExists('searches');
    }
};
