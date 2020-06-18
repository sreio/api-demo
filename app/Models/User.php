<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * 用户表
     * @var string
     */
    protected $table = 'users';

    /**
     * fillable 变量存储允许自动填充模型字段的数组，可以理解为字段修改 白名单
     * 去掉我创建的数据表没有的字段
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'password'
        //'name', 'email', 'password',
    ];

    /**
     * 隐藏部分字段
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password'
        //'password', 'remember_token',
    ];

    /**
     * 将密码进行bcrypt加密
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
