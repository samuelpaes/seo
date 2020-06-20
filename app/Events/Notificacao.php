<?php

namespace SEO\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Notificacao implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification_id;
    public $notification_type;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notification_id, $notification_type,  $message)
    {
        
        $this->notification_id  = $notification_id;
        $this->notification_type  = $notification_type;
        $this->message  = $message;
   
     
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['notificar'];
    }
}