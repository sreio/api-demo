### 项目说明

base-api 是将api开发流程简化，能够快速进行开发

* app ：项目核心文件
    - Api ：api相关文件
        - Helpers :辅助文件
            - ApiResponse.php :返回格式统一
            - ExceptionReport.php :异常处理
    - Http
        - Controllers
            - Api ：api接口文件目录
        - Middleware
            - Api ：api中间件目录
        - Requests
            - Api ：api请求\参数过滤
        - Resources
            - Api ：api返回参数过滤
    - Models ：模型目录


---

#### 安装项目

```bash
> composer install --profile --optimize-autoloader
> chmod 777 -R storage #给storage目录写权限
> cp .env.example .env
> php artisan migrate #创建表
> php artisan key:generate #多服务器禁止执行，生成程序密钥APP_KEY
> php artisan jwt:secret #多服务器禁止执行，生成JWT的密钥
> composer dump-autoload --optimize #生成autoload文件

> php artisan config:cache #优化配置加载
> php artisan api:cache #优化路由加载
```

#### 引入的扩展包
版本请查看composer.json文件

扩展包|说明
---|---
JWT-Auth|实现 API 用户认证
cors|解决跨域问题




