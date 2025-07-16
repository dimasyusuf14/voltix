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
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('metode_pembayaran_id')->nullable()->after('bulan_bayar');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayaran')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['metode_pembayaran_id']);
            $table->dropColumn('metode_pembayaran_id');
        });
    }
};
