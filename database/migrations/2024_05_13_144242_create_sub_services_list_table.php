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
        Schema::create('sub_services_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('services_list_id');
            $table->foreign('services_list_id')->references('id')->on('services_list')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('sub_services_list');
    }
};
