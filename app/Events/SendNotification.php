<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Notification;

class SendNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id, $message, $time, $sender;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notification $notif, $sender = null)
    {
        //
        // $this->id = $notif->id;
        $this->user_id = $notif->user_id;
        $this->message = $notif->message;
        $this->time = $notif->created_at;
        $this->sender = $sender;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notif-channel.'.$this->user_id);
    }

    public function broadcastAs()
    {
        return 'notif-event';
    }
}
