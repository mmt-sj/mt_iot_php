<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/3/20
 * Time: 11:45
 */

namespace Api\Controller;


class FlowersController
{
    public function add()
    {
        if(IS_GET){
            returnApiError("参数：flower_name flower_image_path phone 返回添加后的盆栽参数\r\n
            flower_id,flower_name,flower_image_path");
        }
        if(IS_POST){
            $flowerName=$_POST['flower_name'];
            $flowerImagePath=$_POST['flower_image_path'];
            $phone=$_POST['phone'];
            if(isset($flowerName)&&isset($flowerImagePath)&&isset($phone)){
                $Flower=M("Flower");
                $User=M("User");
                $whereUser['phone']=$_POST['phone'];
                $resUser=$User->where($whereUser)->select();
                $userId=$resUser[0]['user_id'];
                //查询该盆栽是否存在
                $whereFlower['flower_name']=$_POST['flower_name'];
                $whereFlower['user_id']=$userId;
                $res=$Flower->where($whereFlower)->select();
                if($res==null){
                    $data['flower_name']=$_POST['flower_name'];
                    $data['flower_image_path']=$_POST['flower_image_path'];
                    $data['user_id']=$userId;
                    $Flower->add($data);
                    returnApiSuccess("盆栽添加成功",$data);
                }
                else{
                    returnApiError("该名称的盆栽已经存在！");
                }
            }else{
                returnApiError("非法操作");
            }
        }
    }

    public function del()
    {
        if(IS_GET)
        {
            returnApiError("盆栽删除 参数 phone flower_id");
        }
        if(IS_POST)
        {
            $userId=$_POST['phone'];
            $flowerId=$_POST['flower_id'];
            if(isset($userId)&&isset($flowerId))
            {
                $where['user_id']=$userId;
                $where['flower_id']=$flowerId;
                $Flower=M('Flower');
                 $Flower->where($where)->delete();
                returnApiSuccess("删除成功");
            }else{
                returnApiError("非法操作");
            }

        }
    }
}