<?php

use     public function     public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['metode_pembayaran_id']);
        });
    }void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            // Check if foreign key doesn't already exist before adding
            try {
                $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayaran')->onDelete('set null');
            } catch (Exception $e) {
                // Foreign key already exists, skip
            }
        });
    }nate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pembayarans_metode_pembayaran_id', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans_metode_pembayaran_id', function (Blueprint $table) {
            //
        });
    }
};
