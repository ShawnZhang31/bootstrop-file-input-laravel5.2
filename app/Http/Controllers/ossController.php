<?php

namespace App\Http\Controllers;

use App\Libraries\Oss\OssUnilities;
use Illuminate\Http\Request;

use App\Http\Requests;
use OSS\Core\OssException;
use OSS\OssClient;


class ossController extends Controller
{


    //测试阿里云上传
    public function index()
    {
        return view('upload');
//        $ossClient=(new OssUnilities())->make();
////        $ossClient->createBucket('hahahaxxxxxzzzzzz');
//        $filepath='C:\Users\Administrator\Desktop\QQ截图20160605122721.png';
//        $object='images\image.png';
//        $bucket='hahahaxxxxxzzzzzz';
//
//        try
//        {
//            $ossClient->uploadFile($bucket, $object, $filepath);
//        }
//        catch(OssException $e) {
//            printf(__FUNCTION__ . ": FAILED\n");
//            printf($e->getMessage() . "\n");
//            return;
//        }
//        print(__FUNCTION__ . ": OK" . "\n");


    }

    public function uploads(Request $request)
    {


    }

}
