<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2017/3/17
 * Time: 上午1:14
 */

namespace Api\Controller;


use Think\Controller\RestController;

class UserDeviceController extends RestController
{
    function add()
    {
        if(IS_GET){
            returnApiError("用户设备添加  参数 userId,deviceName,deviceType deviceNumber 添加成功后返回用户设备字段");
        }
        if(IS_POST){
            $data['userId']=$_POST["userId"];
            $data["deviceName"]=$_POST["deviceName"];
            $deviceWhere["deviceType"]=$_POST["deviceType"];
            $deviceWhere['deviceNumber']=$_POST["deviceNumber"];
            $Device=M("Device");
            $deviceRes=$Device->where($deviceWhere).find();
            if($deviceRes!=NULL){
                $data["deviceId"]=$deviceRes["deviceId"];
                $UserDevice=M('UserDevice');
                $UserDevice->add($data);
                returnApiSuccess("添加成功",$data);
            }else{
                returnApiError("添加失败,该设备不存在");
            }
        }
    }
    function del(){
        if(IS_POST){
            $data['userId']=$_POST["userId"];
            $data['deviceId']=$_POST['deviceId'];
            $UserDevice=M('UserDevice');
            $UserDevice->where($data)->delete();
            returnApiSuccess("删除成功",$data);
        }
    }
}