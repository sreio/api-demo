<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    function test()
    {
        $max_num = 200000;

        $codes = [];
        for ($i = 1; $i <= $max_num; $i++)
            $codes[] =  app('invite_code')->enCode($i);

        $i = 1;
        foreach ($codes as $code){
            $userId = app('invite_code')->deCode($code); // 邀请码获取用户id

            if( $userId != $i)
                dd("邀请码解密错误".$i);
            $i++;
        }

        dd($codes);
//        $unique_count =  count(array_unique($codes));
//        dd($unique_count);  // 不重复的总数
    }



    public function testlog()
    {
        for ($i = 0; $i < 1000; $i++) {
            Log::info('[INFO]:' . $i);
            Log::error('[ERROR]:' . $i);
            Log::notice('[NOTICE]:' . $i);
            Log::debug('[DEBUG]:' . $i);
            if ($i%100==0) {
                dump(memory_get_usage());
            }
        }
      
        dump(memory_get_usage());
    }
}