<?php

namespace app\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExampleEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;

    public function __construct($message)
    {
        //
        $this->message=$message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("chat-room.".$this->message->chat->id);
    }

    public function broadcastWith()
    {
        return [
            'message' => [
                "user_id" => $this->message->user_id,
                "user" => $this->message->user->name,
                "text" => $this->message->text,
            ],
        ];
    }

    public function broadcastAs()
    {
        return 'new';
    }
}
