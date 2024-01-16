<?php

/**
 * 阿里云日志工具
 * @author steven
 */
namespace xs_aliyun\log;
use Aliyun_Log_Client;
use Aliyun_Log_Exception;
use Aliyun_Log_Models_LogItem;
use Aliyun_Log_Models_PutLogsRequest;
use Aliyun_Log_Models_PutLogsResponse;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class AliLogClient extends AbstractProcessingHandler
{
    protected Aliyun_Log_Client $client ;
    protected $project;
    protected $logStore;
    public function __construct()
    {
        $this->client = new Aliyun_Log_Client(
            config('AliyunLogConfig.aliyun_endpoint'),
            config('AliyunLogConfig.aliyun_access_key_id'),
            config('AliyunLogConfig.aliyun_access_key_secret'),
        );

        $this->project = config('AliyunLogConfig.aliyun_log_project');
        $this->logStore = config('AliyunLogConfig.aliyun_log_store');
    }

    /**
     * 推送日志
     * @return Aliyun_Log_Models_PutLogsResponse|void
     */
    public function write(array $contents,$topic='') :void
    {
        $logItem = new Aliyun_Log_Models_LogItem();
        $logItem->setTime(time());
        $contents['datetime'] = now()->format('Y-m-d H:i:s.u');
        $contents['created'] = time();
        $contents['context'] = json_encode($contents['context'] ?? [],JSON_UNESCAPED_UNICODE);
        $contents['extra'] = json_encode($contents['extra'] ?? [],JSON_UNESCAPED_UNICODE);
        $logItem->setContents($contents);
        $logItems = array($logItem);
        $request = new Aliyun_Log_Models_PutLogsRequest($this->project, $this->logStore,
            $topic, 'xs', $logItems);
        try {
            $this->client->putLogs($request);
        } catch (Aliyun_Log_Exception $ex) {
            Log::error('阿里云日志异常',[$ex]);
        } catch (\Exception $ex){
            Log::error('阿里云日志异常',[$ex]);
        }
    }
}
