<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/3/21
 * Time: 11:44
 */

namespace Admin\Controller;


use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
        $User=M("User");
        $data=$User->select();
        $this->assign('list',$data);
        $this->display();
    }

    public function detail()
    {
        if(isset($_GET["id"])){
            $User=M("User");
            $UserDevice=M("UserDevice");
            $userData=$User->find($_GET["id"]);
            if($userData!=null){
                $this->assign("user",$userData);
                $deviceWhere['user_id']=$_GET["id"];
                $deviceData= $UserDevice->where($deviceWhere)->select();
                $this->assign("device",$deviceData);
                $this->display();
            }else{
                $this->error("用户不存在");
            }
        }else{
            $this->redirect("User/index");
        }
    }

    public function flowerDetail()
    {
        if(isset($_GET["id"])){
            $User=M("User");
            $Flower=M("Flower");
            $userData=$User->find($_GET["id"]);
            if($userData!=null){
                $this->assign("user",$userData);
                $flowerWhere['user_id']=$_GET["id"];
                $flowerData= $Flower->where($flowerWhere)->select();
                $this->assign("flower",$flowerData);
                $this->display();
            }else{
                $this->error("用户不存在");
            }
        }else{
            $this->redirect("User/index");
        }
    }
}