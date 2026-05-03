<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    public function __construct(public Order $order, public string $oldStatus) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject('Update Pesanan #' . $this->order->id . ' — ' . $this->order->status)
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Status pesanan #' . $this->order->id . ' telah diperbarui menjadi: **' . $this->order->status . '**');

        if ($this->order->tracking_number) {
            $mail->line('Nomor resi: ' . $this->order->tracking_number . ' (' . $this->order->courier . ')');
        }

        if ($this->order->status === 'Dibatalkan' && $this->order->cancel_reason) {
            $mail->line('Alasan: ' . $this->order->cancel_reason);
        }

        return $mail
            ->action('Lihat Pesanan', route('orders.show', $this->order))
            ->line('Terima kasih telah berbelanja di Frozymart!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type'     => 'order_status',
            'order_id' => $this->order->id,
            'message'  => 'Pesanan #' . $this->order->id . ' — status: ' . $this->order->status,
            'status'   => $this->order->status,
            'url'      => route('orders.show', $this->order),
        ];
    }
}