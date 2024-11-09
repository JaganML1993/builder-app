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
        Schema::table('case_studies', function (Blueprint $table) {
            $table->string('client_title')->nullable();
            $table->longText('client_description')->nullable();

            $table->string('client_req_title')->nullable();
            $table->longText('client_req_desc')->nullable();

            $table->string('business_title')->nullable();
            $table->longText('business_desc')->nullable();
            $table->longText('business_items')->nullable();

            $table->string('our_solution_title')->nullable();
            $table->longText('our_solution_desc')->nullable();

            $table->string('the_results_title')->nullable();
            $table->longText('the_results_desc')->nullable();

            $table->string('out_source_title')->nullable();
            $table->longText('out_source_desc')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_studies', function (Blueprint $table) {
            //
        });
    }
};
