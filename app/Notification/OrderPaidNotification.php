<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPaidNotification extends Notification
{
    use Queueable;

    public function __construct(public Order $order) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pembayaran Berhasil - Pesanan #' . $this->order->id)
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Pembayaran untuk pesanan #' . $this->order->id . ' telah berhasil dikonfirmasi.')
            ->line('Total: Rp ' . number_format($this->order->grand_total, 0, ',', '.'))
            ->line('Status: ' . $this->order->status)
            ->action('Lihat Pesanan', route('orders.show', $this->order))
            ->line('Terima kasih telah berbelanja di Frozymart!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'     => 'order_paid',
            'order_id' => $this->order->id,
            'message'  => 'Pembayaran pesanan #' . $this->order->id . ' berhasil!',
            'total'    => $this->order->grand_total,
            'url'      => route('orders.show', $this->order),
        ];
    }
}