<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 7:09
 */

namespace App\Libraries\Oss;

use OSS\OssClient;
use OSS\Core\OssException;

class OssUnilities
{
    public function make()
    {
         $accessKeyId ='ccpl5HFeMfylPgUS1';
         $accessKeySecret='lLFxdkmLGDoVxR1J5Ax2nDMQxvQKePv';
         $endpoint='ooss-cn-shenzhen.aliyuncs.com';

        try
        {
            $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
        }
        catch (OssException $e)
        {
            print $e->getMessage();
        }

        $ossClient->setTimeout(3600);
        $ossClient->setConnectTimeout(10);

        return $ossClient;
    }

}