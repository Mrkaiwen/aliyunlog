# xs-aliyunlog

### 安装

```
composer require xs_aliyun/log
```

`.env`阿里云日志配置
```
ALIYUN_ACCESS_KEY_ID=阿里云AccessKeyId
ALIYUN_ACCESS_KEY_SECRET=阿里云AccessKeySecret
ALIYUN_ENDPOINT=接口站点
ALIYUN_LOG_PROJECT=日志项目
ALIYUN_LOG_STORE=日志库
```


修改`config/logging.php  => channels`

```php
'channels' => [
        'aliyunlog' => [
            'driver' => 'custom',
            'via' => xs_aliyun\log\laravel\AliLogVia::class,
            'level' => env('LOG_LEVEL', 'debug'),
        ],
    ],
```

修改 `config/app.php  =>  providers`
```php
    'providers' => [
        //日志类型
        xs_aliyun\log\AliyunLogServiceProvider::class,
    ]
```