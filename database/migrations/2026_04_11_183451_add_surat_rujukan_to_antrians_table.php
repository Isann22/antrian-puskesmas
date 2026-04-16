<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->string('surat_rujukan')->nullable()->after('poli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropColumn('surat_rujukan');
        });
    }
};
