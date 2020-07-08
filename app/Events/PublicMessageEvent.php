<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PublicMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message = '')
    {
        $this->message = $message;
    }

    /**
     * 定义频道名称
     *
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('pushMessage');
    }


    /**
     * 控制广播数据
     * @return mixed
     */
    public function broadcastWith()
    {
        return [
            "message" => $this->message,
            'status'  => empty($this->message) ? 0 : 1,
        ];
    }
}
