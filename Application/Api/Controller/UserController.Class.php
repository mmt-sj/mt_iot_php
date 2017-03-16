<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2017/3/16
 * Time: 下午11:53
 */

namespace Api\Controller;

use Think\Controller\RestController;

class UserController extends RestController
{
    public function add()
    {

        if(IS_POST){
            $data['userName']=$_POST["name"];
            $data['phone']=$_POST["phoneNumber"];
            $data['password']=$_POST["password"];
            $User=M("User");
            $where['phone']=$data['phone'];
            $res= $User->where($where)->find();
            if($res!=NULL){
                returnApiError("该账户已存在");
            }
            else{
                $User->add($data);
                returnApiSuccess("","注册成功");
            }

        }
    }
    public function login(){
        if(IS_GET){
            $data['phone']=$_GET["phone"];
            $data['password']=$_GET["password"];
            $User=M("User");
            $res= $User->where($data)->find();
            if($res!=NULL){

                returnApiSuccess("",$res);
            }
            else{
                returnApiError("登录失败");

            }

        }
    }

}