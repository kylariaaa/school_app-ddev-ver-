<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('school_classes', function (Blueprint $table) {
        $table->unsignedBigInteger('jurusan_id')->after('name');
        $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_classes', function (Blueprint $table) {
            //
        });
    }
};
