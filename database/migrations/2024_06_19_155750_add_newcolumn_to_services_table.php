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
            $table->string('outsource_title')->nullable();
            $table->text('outsource_description')->nullable();
            $table->text('outsource_dynamic')->default(false);
            $table->text('outsource_para')->nullable();
            $table->string('testimonial_main_title')->nullable();
            $table->string('testimonial_title_link')->nullable();
            $table->string('client_main_title')->nullable();
            $table->string('client_title_link')->nullable();
            $table->string('tech_title')->nullable();
            $table->string('additional_title')->nullable();
            $table->string('article_main_title')->nullable();
            $table->string('industry_main_title')->nullable();
            $table->string('industry_items')->nullable();
            $table->string('more_service_main_title')->nullable();
            $table->text('more_service_items')->nullable();
            $table->string('tech_title_link')->nullable();
            $table->string('faq_main_title')->nullable();
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
            //
        });
    }
};
