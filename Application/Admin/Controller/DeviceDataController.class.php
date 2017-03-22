<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/3/22
 * Time: 13:17
 */

namespace Admin\Controller;


use Think\Controller;

class DeviceDataController extends Controller
{
    public  function  index()
    {
        $DeviceData=M('DeviceData');
        $res=$DeviceData->select();
        $this->assign("list",$res);
        $this->display();
    }
}