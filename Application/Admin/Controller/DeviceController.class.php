<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2017/3/17
 * Time: 上午1:58
 */

namespace Admin\Controller;


use Think\Controller;

class DeviceController extends Controller
{
    public function index(){
        $Device=M('Device');
        $data=$Device->order('device_id desc')->select();
        $this->assign('list',$data);
        $this->display();
    }
    public function add()
    {
        $Device=M('Device');
        if(isset($_GET['id'])){
            $where['device_id']=$_GET['id'];
            $data=$Device->where($where)->find();
            $this->assign('data',$data);
        }
        $this->display();
    }

    public function addPost(){
        $Device=M('Device');
        $Device->Create();
        if($_POST['device_id']!=""){
            $Device->save();
        }else{
            $Device->add();
        }
        $this->redirect("Device/index");
    }

    public function delete(){
        $id=$_GET['id'];
        $Device=M("Device");
        $Device->delete($id);
        $this->redirect("Device/index");
    }
}