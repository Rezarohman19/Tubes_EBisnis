<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::table('orders', function (Blueprint $table) {
        $table->string('payment_proof')->nullable()->after('coupon_code');
        $table->timestamp('payment_proof_uploaded_at')->nullable()->after('payment_proof');
        $table->text('payment_rejection_reason')->nullable()->after('payment_proof_uploaded_at');
    });
    }

public function down(): void
    {
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn(['payment_proof', 'payment_proof_uploaded_at', 'payment_rejection_reason']);
    });
    }
};
