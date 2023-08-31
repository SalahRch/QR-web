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
        Schema::create('zones', function (Blueprint $table) {
            $table->bigIncrements('zone_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('pdf')->nullable();
            $table->text('dp')->nullable();
            $table->string('qr_codePDF')->nullable();
            $table->string('qr_codeDP')->nullable();
            $table->text('images')->nullable();
            $table->text('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
