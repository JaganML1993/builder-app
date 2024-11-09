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
            $table->string('why_choose_title')->nullable()->after('related_service');
            $table->text('why_choose_description')->nullable()->after('related_service');
            $table->json('why_choose_contents')->nullable()->after('related_service');
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
            $table->dropColumn('why_choose_title');
            $table->dropColumn('why_choose_description');
            $table->dropColumn('why_choose_contents');
        });
    }
};
