<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset = utf-8">
    <title>HTML5</title>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

</head>
<body >
<button id="ajaxTest">dianji </button>

<script>
    $().ready(function () {
        $("#ajaxTest").click(function () {
                        $.ajax({
                            type:"POST",
                            url:"http://localhost/mt_iot/index.php/User/add",
                            data:{name:"liuyi",phoneNumber:"15366126076",password:"123456"},
                            success:function (data) {
                                alert(data);
                            }
                        });
        });
    });

</script>
</body>
</html>