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
        Schema::table('services', function (Blueprint $table) {
            $table->string('service_slug')->nullable();
            $table->string('sub_service_slug')->nullable();
            $table->string('sub_sub_service_slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('service_slug')->nullable();
            $table->string('sub_service_slug')->nullable();
            $table->string('sub_sub_service_slug')->nullable();
        });
    }
};
