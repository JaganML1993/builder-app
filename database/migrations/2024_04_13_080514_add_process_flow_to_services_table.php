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
            $table->string('process_flow_title')->nullable()->after('related_service');
            $table->text('process_flow_description')->nullable()->after('related_service');
            $table->json('process_flow_contents')->nullable()->after('related_service');
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
            $table->dropColumn('process_flow_title');
            $table->dropColumn('process_flow_description');
            $table->dropColumn('process_flow_contents');
        });
    }
};
