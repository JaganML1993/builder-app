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
        Schema::table('sub_sub_services_list', function (Blueprint $table) {
            $table->unsignedBigInteger('services_list_id')->after('id');
            $table->foreign('services_list_id')->references('id')->on('services_list')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_sub_services_list', function (Blueprint $table) {
            $table->dropForeign(['services_list_id']);
            $table->dropColumn('services_list_id');
        });
    }
};
