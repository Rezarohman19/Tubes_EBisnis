<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'total', 'shipping_address', 'payment_method',
        'payment_status', 'status', 'midtrans_order_id',
        'midtrans_transaction_id', 'midtrans_snap_token',
        'snap_redirect_url', 'midtrans_status', 'paid_at',
        'courier', 'tracking_number', 'shipping_cost',
        'discount', 'coupon_code', 'cancel_reason',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getPaymentMethodLabelAttribute(): string
    {
        return match ($this->payment_method) {
            'bank_transfer' => 'Transfer Bank (Virtual Account)',
            'dana'          => 'DANA',
            'qris'          => 'QRIS',
            'gopay'         => 'GoPay',
            'ovo'           => 'OVO',
            'shopee_pay'    => 'ShopeePay',
            'midtrans'      => 'Midtrans',
            default         => ucfirst(str_replace('_', ' ', $this->payment_method)),
        };
    }

    public function getPaymentStatusLabelAttribute(): string
    {
        return match ($this->payment_status) {
            'paid'    => 'Lunas',
            'pending' => 'Menunggu Pembayaran',
            'expired' => 'Kedaluwarsa',
            'failed'  => 'Gagal',
            'cancel'  => 'Dibatalkan',
            default   => 'Menunggu Pembayaran',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'Menunggu Pembayaran' => 'yellow',
            'Diproses'            => 'blue',
            'Dikirim'             => 'indigo',
            'Selesai'             => 'green',
            'Dibatalkan'          => 'red',
            default               => 'gray',
        };
    }

    /**
     * PERBAIKAN #5: grand_total tidak boleh double-kurangi diskon.
     *
     * Alur pembuatan order di ProductController@placeOrder:
     *   $grandTotal = subtotal - discount  → disimpan ke kolom `total`
     *
     * Jadi `total` sudah berisi harga bersih setelah diskon.
     * grand_total = total + shipping_cost (saja)
     *
     * Versi lama: return $this->total + $this->shipping_cost - $this->discount;
     * Ini salah karena diskon sudah dikurangkan dari total saat order dibuat.
     */
    public function getGrandTotalAttribute(): int
    {
        return $this->total + ($this->shipping_cost ?? 0);
    }
}