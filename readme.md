# laravel 广播系统demo
> 本实例使用 redis + soocket.io 组合

---

## 部署步骤
> git clone 本项目
> composer install 安装
    >> 安装了 `predis/predis` 扩展
> npm install
    >> 安装了 `laravel-echo` 扩展，客户端socket.io监听
>  服务端安装 `laravel-echo-server`
    >> `laravel-echo-server init` 初始化配置
    >> 服务端运行 `laravel-echo-server start`
> 保持`.env`配置文件
    >> `QUEUE_DRIVER=redis`  `BROADCAST_DRIVER=redis`
> `php artisan queue:work` 开启队列


1. 公共频道
> `app/Events/PublicMessageEvent.php:39` 公共频道事件
> `routes/web.php:20` url手动模拟推送消息
> `resources/views/welcome.blade.php:27` 前端页面监听
           

2. 私有频道
> `app/Events/PrivateMessageEvent.php:39` 私有频道
> `routes/web.php:26` url手动模拟推送消息
> `resources/views/welcome.blade.php:35` 前端页面监听
> `routes/channels.php:14` 私有频道需要定义切用户认证才可以监听
       
---
    
## 参考资料

### 广播系统学习
> https://blog.csdn.net/weixin_30933531/article/details/97385073
### 广播公共\私有频道学习
> https://blog.csdn.net/qq_42872677/article/details/106930017
### 解决npm run dev 失败
> https://learnku.com/laravel/t/35584