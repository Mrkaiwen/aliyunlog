# kaiwen-log

[//]: # (### 安装)


[//]: # (```)

[//]: # ()
[//]: # (composer require xs_aliyun/log)

[//]: # ()
[//]: # (```)


`.env`阿里云日志配置

```
ALIYUN_ACCESS_KEY_ID=阿里云AccessKeyId
ALIYUN_ACCESS_KEY_SECRET=阿里云AccessKeySecret
ALIYUN_ENDPOINT=接口站点
ALIYUN_LOG_PROJECT=日志项目
ALIYUN_LOG_STORE=日志库
```

[//]: # ()
[//]: # (修改`config/logging.php  => channels`)

[//]: # ()
[//]: # ()
[//]: # (```php)

[//]: # ()
[//]: # ('channels' => [)

[//]: # ()
[//]: # (        'aliyunlog' => [)

[//]: # ()
[//]: # (            'driver' => 'custom',)

[//]: # ()
[//]: # (            'via' => xs_aliyun\log\laravel\AliLogVia::class,)

[//]: # ()
[//]: # (            'level' => env&#40;'LOG_LEVEL', 'debug'&#41;,)

[//]: # ()
[//]: # (        ],)

[//]: # ()
[//]: # (    ],)

[//]: # ()
[//]: # (```)

[//]: # ()
[//]: # ()
[//]: # (修改 `config/app.php  =>  providers`)

[//]: # ()
[//]: # (```php)

[//]: # ()
[//]: # (    'providers' => [)

[//]: # ()
[//]: # (        //日志类型)

[//]: # ()
[//]: # (        xs_aliyun\log\AliyunLogServiceProvider::class,)

[//]: # ()
[//]: # (    ])

[//]: # ()
[//]: # (```)



`.env`mangodb 配置

```
MONGO_USERNAME=账号
MONGO_PASSWORD=密码
MONGO_HOST=服务器地址
MONGO_PORT=端口
MONGO_LOG_DATABASE=日志库
MONGO_LOG_COLLECTION=日志表
```