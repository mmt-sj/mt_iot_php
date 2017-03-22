<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/3/22
 * Time: 12:25
 */

namespace Api\Controller;


use Think\Controller\RestController;

class DeviceController extends RestController
{
    public  function pushData ()
    {
        if (IS_GET)
        {
            returnApiError("用于设备上传信息 参数 device_number  data");
        }
        if(IS_POST)
        {
            $deviceNumber=$_POST['device_number'];
            $deviceData=$_POST['data'];
            if(isset($deviceData)&&isset($deviceNumber)){
                $Device=M("Device");
                $deviceRes=$Device->where(array('device_number'=>$deviceNumber))->select();
                if($deviceRes!=null)
                {
                    $data['device_id']=$deviceRes[0]['device_id'];
                    $data['device_data']=$deviceData;
                    $data['device_data_time']=date();
                    $data['device_data_ip']=get_client_ip();
                    $DeviceData=M("DeviceData");
                    $DeviceData->add($data);
                   returnApiSuccess("push成功");
                    #waring;
                }else{
                    returnApiError("该设备不寸在");
                }
            }else
            {
                returnApiError("非法操作");
            }
        }
    }
}