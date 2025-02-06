<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PrivateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public $downloadURL, public User $user)
    {
        //
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("App.User." . $this->user->id),
        ];
    }

    public function broadcastWith(): array
    {
        return array(
            'username' => 'Welcome ' .  $this->user->name,
            'message' => 'Notification is reader for you',
        );
    }

    public function broadcastAs(): string
    {
        return 'user.notification';
    }
}
