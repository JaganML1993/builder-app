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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('reimage_title')->nullable();
            $table->longText('reimage_desc')->nullable();
            $table->longText('reimage_items')->nullable();

            $table->string('regis_title')->nullable();
            $table->longText('regis_desc')->nullable();
            $table->longText('regis_items')->nullable();

            $table->string('digital_title')->nullable();
            $table->longText('digital_desc')->nullable();
            $table->longText('digital_items')->nullable();
            $table->string('digital_para')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
