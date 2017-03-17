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
        $this->assign('list',$Device);
        $this->display();
    }
}