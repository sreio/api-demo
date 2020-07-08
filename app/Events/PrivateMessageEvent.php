<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrivateMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $userid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userid = 0,$message = '')
    {
        $this->userid = $userid;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //私有频道
        return new PrivateChannel("private-user-id".$this->userid);
    }

    public function broadcastWith()
    {
        //定义广播返回数据
        return [
            'userid' => $this->userid,
            'message' => $this->message,
            'status'  => empty($this->message) ? 0 : 1,
        ];
    }
}
