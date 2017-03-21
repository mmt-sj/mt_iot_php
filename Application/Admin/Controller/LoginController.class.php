<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/3/18
 * Time: 11:06
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller
{
    public function index(){
        $this->display();
    }
    public function login(){
        if(IS_POST){
            $Admin=M("Admin");
            if(isset($_POST['admin_number'])&&isset($_POST['admin_password'])){
                $where['admin_number']=$_POST['admin_number'];
                $where['admin_password']=$_POST['admin_password'];
                $res=$Admin->where($where)->find();
                if($res!=null){
                    $_SESSION['admin']=$res['admin_id'];
                    $this->ajaxReturn(array('msg'=>'success'),'json');
                }else{
                    $this->ajaxReturn(array('msg'=>'账号或密码错误'),'json');
                }
            }else{
                $this->ajaxReturn(array('msg'=>'非法操作'),'json');
            }
        }else{
            $this->ajaxReturn(array('msg'=>'非法操作'),'json');
        }
    }
}