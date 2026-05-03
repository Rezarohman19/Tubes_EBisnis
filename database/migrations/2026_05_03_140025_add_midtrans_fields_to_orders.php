<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('midtrans_order_id')->nullable()->after('id');
            $table->string('midtrans_transaction_id')->nullable()->after('midtrans_order_id');
            $table->string('midtrans_snap_token')->nullable()->after('midtrans_transaction_id');
            $table->string('snap_redirect_url')->nullable()->after('midtrans_snap_token');
            $table->string('midtrans_status')->nullable()->after('snap_redirect_url');
            $table->timestamp('paid_at')->nullable()->after('midtrans_status');
            $table->string('courier')->nullable()->after('paid_at');
            $table->string('tracking_number')->nullable()->after('courier');
            $table->integer('shipping_cost')->default(0)->after('tracking_number');
            $table->integer('discount')->default(0)->after('shipping_cost');
            $table->string('coupon_code')->nullable()->after('discount');
            $table->text('cancel_reason')->nullable()->after('coupon_code');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'midtrans_order_id', 'midtrans_transaction_id', 'midtrans_snap_token',
                'snap_redirect_url', 'midtrans_status', 'paid_at', 'courier',
                'tracking_number', 'shipping_cost', 'discount', 'coupon_code', 'cancel_reason',
            ]);
        });
    }
};