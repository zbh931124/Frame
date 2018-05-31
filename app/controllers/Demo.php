<?php

namespace app\controllers;

use code\system\pdo\mysql;
use code\system\pdo\mysqlPDO;
use OSS\Core\OssException;
use OSS\OssClient;

class Demo extends Base {

    public function __construct()
    {
        parent::__construct();
    }

    private $key="LTAInfT9riSegJRP";
    private $secret="6vhtOkyU9HmHhyj7S1iwdsXytcETjj";
    private $endpoint="oss-cn-shenzhen.aliyuncs.com";

    public function demo($data=[]){
//        $config=config('ali')['oss'];
//        $ossClient= new OssClient($config['key'],$config['secret'],$config['endpoint']);
//        $file="F:\code\api\public\uploads\header_3.jpg";
//        $bucket="dgyr-oss";
//        $object="artist/".md5(time());
//        try{
//            $ossClient->uploadFile($bucket,$object,$file);
//        }catch (OssException $e){
//            echo $e->getMessage();
//        }


//        $pdo=new mysql();
//        $pdo->demo();


        include_once EXTPATH.'aliyun-dysms-php-sdk/api_demo/SmsDemo.php';

        dump(\SmsDemo::sendSms('15602207756','1234'));


    }
}