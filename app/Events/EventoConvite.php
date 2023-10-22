<?php

namespace App\Events;

use App\Models\Freela;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventoConvite
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $freela;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Freela $freela)
    {
        $this->freela = $freela;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
