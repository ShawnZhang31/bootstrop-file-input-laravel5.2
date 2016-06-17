<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;



class UploadController extends Controller
{
    //

    //删除文件
    public function destory($imagename)
    {

        $key=Input::get('key');
        unlink('uploads/'.$imagename);
        return json_encode(['success'=>'ok']);
    }

    //上传文件
    public function up()
    {
        $file = Input::file('images');
        $paths=[];
        $output=null;
        $newName=null;
        $initialPreview=$initialPreviewConfig=null;
        if($file -> isValid())
        {
            $success=null;
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $key=md5(uniqid());
            $newFileName=$key.'.'.$entension;
            $size=$file->getSize();
            $newName ='uploads/'.$newFileName;
            $url="http://localhost:8000/uploads/".$newFileName;
            if (move_uploaded_file($file,$newName))
            {
                $success=true;
                $paths[]=$newName;
            }
            else
            {
                $success=false;
            }

            if ($success)
            {
                //保存数据到数据库
//                $initialPreviewConfig=[caption=>'ddd.jpg','with'=>'120px',url=>"{{url('/image/delete')}}",key=>100];
                return json_encode([
                    'initialPreview' => [
                        $url
                    ],
                    'initialPreviewConfig' => [
                        ['caption' => $newFileName, 'size' => $size, 'width' => '120px', 'url' => "http://localhost:8000/image/delete/".$newFileName, 'key' => $key],
                    ],
                    'append' => true
                ]);

            }
            else
            {
                $output = ['error' => '上传失败，请联系管理员处理'];
                // 删除上传的文件
                foreach ($paths as $file)
                {
                    unlink($file);
                }
            }
        }
        else
        {
            echo json_encode(['error' => '未提交任何有效的文件.']);
            // 这里也可以抛出一个异常
            return; // 终止
        }

        return json_decode($output);
    }

}
