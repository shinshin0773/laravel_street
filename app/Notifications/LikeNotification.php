<?php

namespace App\Notifications;

use App\Models\Likes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;

    private Likes $information;

    /**
     * Create a new notification instance.
     *
     * @param Posts $information
     */
    public function __construct(Likes $information)
    {
        $this->information = $information;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->information->user_id,
            'artist_id' => $this->information->artist_id,
            'post_id' => $this->information->post_id,
            'created_at' => $this->information->created_at,
             //  通知からリンクしたいURLがあれば設定しておくと便利
            //  'url' => route('user.items.show', ['item' => $this->information->id,'artist_id' => $this->information->artist_profile_id ])
        ];
    }
}
