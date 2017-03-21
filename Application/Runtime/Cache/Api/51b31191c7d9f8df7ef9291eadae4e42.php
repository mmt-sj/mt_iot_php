<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset = utf-8">
    <title>HTML5</title>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

</head>
<body >



<button id="ajaxTest">注册</button>
<button id ="addFlower">添加盆栽</button>
<script>
    $().ready(function () {
        $("#ajaxTest").click(function () {
                        $.ajax({
                            type:"POST",
                            url:"User/add",
                            data:{name:"liuysssssi",phoneNumber:"15366126076",password:"123456"},
                            success:function (data) {
                                alert(data);
                            }
                        });
        });

        $("#addFlower").click(function () {
            $.ajax({
                type:"POST",
                url:"Flowers/add",
                data:{flower_name:"liuyidddasss",phone:"15366126076",flower_image_path:"123456"},
                success:function (data) {
                    var jsobObj=JSON.parse(data);
                    alert(jsobObj.msg);
                }
            });
        });
    });

</script>



</body>
</html>