<?php

namespace App\Http\Controllers\API;

use App\Events\PodcastEvent;
use App\Jobs\ProcessPodcast;
use App\Podcast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PodcastController extends Controller
{
    public function store()
    {
        $model = new Podcast();
        $model->status = 0;
        $model->save();
        //触发队列任务
        //ProcessPodcast::dispatch($model);
        //一分钟之后执行队列任务
        ProcessPodcast::dispatch($model)->delay(Carbon::now()->addMinutes(1));
        echo "添加成功：{$model->id}";
    }


    public function store2()
    {
        $model = new Podcast();
        $model->status = 0;
        $model->save();
        // 触发事件
        event(new PodcastEvent($model));
        echo "添加成功：{$model->id}";
    }
}
