<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <title>渡目成书</title>
</head>
<body>
<div class="container">
    <form class="form-signin" method="post" action="<?php echo U('Admin/Account/login');?>">
        <h2 class="form-signin-heading">管理后台</h2>
        <label for="inputAccount" class="sr-only">账号：</label>
        <input type="text" id="inputAccount" name="account" class="form-control" placeholder="请输入账号" required
               autofocus>
        <label for="inputPassword" class="sr-only">密码：</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="请输入密码"
               required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
    </form>
</div>
</body>
</html>