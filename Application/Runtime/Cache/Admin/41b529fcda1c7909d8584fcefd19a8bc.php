<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link href="../../../Public/Static/Dist/flat/css/flat-ui.min.css" type="text/css" rel="stylesheet">
<link href="../../../Public/Static/Dist/flat/css/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="../../../Public/Static/Dist/flat/js/vendor/jquery.min.js"></script>
<script src="../../../Public/Static/Dist/flat/js/vendor/html5shiv.js"></script>
<script src="../../../Public/Static/Dist/flat/js/vendor/respond.min.js"></script>
<script src="../../../Public/Static/Dist/flat/js/flat-ui.min.js"></script>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="#">iot后台管理</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#fakelink">设备管理</a></li>
            <li><a href="#fakelink">用户管理</a></li>
        </ul>
        <form class="navbar-form navbar-right" action="#" role="search">
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" id="navbarInput-01" type="search" placeholder="查询">
                    <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
                </div>
            </div>
        </form>
    </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->
<div class="container">
    <div class="form-inline">
    <button class="btn btn-default">新增</button>
</div>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>编号</th>
            <th>类型</th>
            <th>操作</th>
        </tr>
    </thead>
    <foeach name="list" item="vo">
        <tr>
            <td><?php echo ($vo['deviceId']); ?></td>
            <td><?php echo ($vo['deviceNumber']); ?></td>
            <td><?php echo ($vo['deviceType']); ?></td>
            <td>
                <a class="btn btn-info btn-xs">编辑</a>
                <a class="btn btn-danger btn-xs">删除</a>
            </td>
        </tr>
    </foeach>
</table>
</div>

</body>
</html>