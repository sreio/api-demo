- 队列demo
    1. php artisan make:model Podcast
    2. 创建数据表
    ```
    CREATE TABLE `podcast` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `status` tinyint(1) NOT NULL,
      `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'CURRENT_TIMESTAMP',
      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ```
    3. 更改Model模型 app/Podcast.php
    4. 创建队列模型 `php artisan make:job ProcessPodcast`
    5. 填写队列处理逻辑 app/Jobs/ProcessPodcast.php
    6. 创建控制器 `php artisan make:controller API/PodcastController`
    7. 更改控制器内容，并创建相关路由 app/Http/Controllers/API/PodcastController.php、routes/api.php
    8. 运行api路由 添加数据，并创建队列任务 详情查看：app/Http/Controllers/API/PodcastController.php:13
    9. 开启队列任务 `php artisan queue:work`
    
Ps:其它队列驱动的依赖扩展包
在使用列表里的队列服务前，必须安装以下依赖扩展包：

- Amazon SQS: aws/aws-sdk-php ~3.0
- Beanstalkd: pda/pheanstalk ~3.0
- Redis: predis/predis ~1.0

- 事件系统

    1. 触发方法逻辑： app/Http/Controllers/API/PodcastController.php:27
    2. 事件类: app/Events/PodcastEvent.php
    3. 监听类： app/Listeners/PodcastListener.php
    4. 注册： app/Providers/EventServiceProvider.php:20
        > key(事件类) -> [ 监听类 ] 一个事件可以对应多个监听
