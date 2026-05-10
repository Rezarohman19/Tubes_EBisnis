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
        'payment_proof', 'payment_proof_uploaded_at', 'payment_rejection_reason',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'payment_proof_uploaded_at' => 'datetime',
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
            'bca'        => 'Transfer Bank BCA',
            'mandiri'    => 'Transfer Bank Mandiri',
            'bni'        => 'Transfer Bank BNI',
            'bri'        => 'Transfer Bank BRI',
            'dana'       => 'DANA',
            'gopay'      => 'GoPay',
            'ovo'        => 'OVO',
            'shopee_pay' => 'ShopeePay',
            'qris'       => 'QRIS',
            'cod'        => 'Bayar di Tempat (COD)',
            default      => ucfirst(str_replace('_', ' ', $this->payment_method)),
        };
    }

    public function getPaymentStatusLabelAttribute(): string
    {
        return match ($this->payment_status) {
            'paid'           => 'Lunas',
            'pending'        => 'Menunggu Pembayaran',
            'proof_uploaded' => 'Bukti Dikirim',
            'rejected'       => 'Ditolak',
            'expired'        => 'Kedaluwarsa',
            'failed'         => 'Gagal',
            default          => 'Menunggu Pembayaran',
        };
    }

    public function getPaymentStatusColorAttribute(): string
    {
        return match ($this->payment_status) {
            'paid'           => 'green',
            'proof_uploaded' => 'blue',
            'rejected'       => 'red',
            'pending'        => 'yellow',
            default          => 'gray',
        };
    }

    public function getStatusColorAttribute(): string
    {
        $map = [
            'Menunggu Pembayaran'     => 'yellow',
            'Pembayaran Dikonfirmasi' => 'blue',
            'Diproses'                => 'indigo',
            'Dikirim'                 => 'purple',
            'Selesai'                 => 'green',
            'Dibatalkan'              => 'red',
        ];

        return $map[$this->status] ?? 'gray';
    }

    public function getGrandTotalAttribute(): int
    {
        return $this->total + ($this->shipping_cost ?? 0);
    }

    public function isCod(): bool
    {
        return $this->payment_method === 'cod';
    }

    public function canUploadProof(): bool
    {
        return ! $this->isCod()
            && in_array($this->payment_status, ['pending', 'rejected'])
            && $this->status !== 'Dibatalkan';
    }
}