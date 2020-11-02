<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

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
}