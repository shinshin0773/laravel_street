<?php

namespace App\Notifications;

use App\Models\Posts;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;

    private Posts $information;

    /**
     * Create a new notification instance.
     *
     * @param Posts $information
     */
    public function __construct(Posts $information)
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
            'name' => $this->information->name,
            'information' => $this->information->information,
            'place' => $this->information->place,
            'holding_time' => $this->information->holding_time,
             //  通知からリンクしたいURLがあれば設定しておくと便利
             'url' => route('user.items.show', ['item' => $this->information->id,'artist_id' => $this->information->artist_profile_id ])
        ];
    }
}
