<?php

namespace App\Listeners;

use App\Events\PodcastEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;//如果继承这个类 就是异步队列

class PodcastListener
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PodcastEvent  $event
     * @return void
     */
    public function handle(PodcastEvent $event)
    {
        //十秒之后执行
//        if (true) {
//            $this->release(30);
//        }
        $event->podcast->status = 2;
        $event->podcast->update();
    }
}
