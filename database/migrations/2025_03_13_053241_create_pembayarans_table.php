<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeonDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('refferal_code_id')->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->string('status', ['pending', 'paid', 'failed'])->default('pending'); // Status pembayaran
            $table->string('transaction_id')->unique(); // ID transaksi unik
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
