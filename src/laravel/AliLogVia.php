<?php

namespace xs_aliyun\log\laravel;

use Monolog\Logger;
use xs_aliyun\log\AliLogClient;

class AliLogVia
{
    public function __invoke()
    {
        $channel = $config['name'] ?? config('app.name');
        $monolog = new Logger($channel);
        $monolog->pushHandler(new AliLogClient());
        return $monolog;
    }
}
