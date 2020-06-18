<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //返回用户列表
    public function index(){
        //3个用户为一页
        $users = User::query()->paginate(3);
        return $this->success($users);
    }
    //返回单一用户信息
    public function show(User $user){
        return $this->success($user);
    }
    //用户注册
    public function store(UserRequest $request){
        User::query()->create($request->all());
        return $this->setStatusCode(201)->success('用户注册成功');
    }
    //用户登录
    public function login(Request $request){
        $res=Auth::guard('web')->attempt(['name'=>$request->name,'password'=>$request->password]);
        if($res){
            return $this->setStatusCode(201)->success('用户登录成功...');
        }
        return $this->failed('用户登录失败',401);
    }
}
