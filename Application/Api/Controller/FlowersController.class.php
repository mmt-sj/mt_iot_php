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
        if(IS_POST){
            $flowerName=$_POST['flowerName'];
            $flowerImagePath=$_POST['flowerImagePath'];
            $phone=$_POST['phone'];
            if(isset($flowerName)&&isset($flowerImagePath)&&isset($phone)){
                $Flower=M("Flower");
                $User=M("User");
                $whereUser['phone']=$_POST['phone'];
                $User->where($whereUser)->select();
                $userId=$User[0].user_id;
                //查询该盆栽是否存在
                $whereFlower['flower_name']=$_POST['flower_name'];
                $whereFlower['user_id']=$userId;
                $res=$Flower->where($whereFlower)->select();
                if($res!=null){
                    $data['flower_name']=$_POST['flower_name'];
                    $data['flower_image_path']=$_POST['flower_image_path'];
                    $data['user_id']=$userId;
                    $Flower->add($data);
                    returnApiSuccess("","盆栽添加成功");
                }
                else{
                    returnApiError("该名称的盆栽已经存在！");
                }
            }else{
                returnApiError("非法操作");
            }
        }
    }
}