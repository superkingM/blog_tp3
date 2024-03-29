<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>渡目博客后台</title>
    <meta name="description" content="渡目博客后台">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/Public/admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="博客"/>
    <script src="/Public/admin/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/Public/admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/admin/css/amazeui.datatables.min.css"/>
    <link rel="stylesheet" href="/Public/admin/css/app.css">
    <script src="/Public/admin/js/jquery.min.js"></script>

</head>

<body data-type="index">
<script src="/Public/admin/js/theme.js"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;"><img src="/Public/admin/img/logo.png" alt=""></a>
        </div>
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">
            <!-- 侧边切换 -->
            <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
            </div>

            <!-- 其它功能-->
            <div class="am-fr tpl-header-navbar">
                <ul>
                    <!-- 欢迎语 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="javascript:;">欢迎你, <span><?php echo session('admin.account');?></span> </a>
                    </li>
                    <!-- 退出 -->
                    <li class="am-text-sm">
                        <a href="javascript:;" onclick="logout()">
                            <span class="am-icon-sign-out"></span> 退出
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </header>
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        <div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <img src="/Public/admin/img/user04.png" alt="">
                </div>
                <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              <?php echo session('admin.account');?>
          </span>
                <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
            </div>
        </div>

        <!-- 菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-link">
                <a href="<?php echo U('Admin/index/index');?>" class="<?php if(isset($a_index)){echo $a_index;}?>">
                    <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="<?php echo U('Admin/Category/index');?>" class="<?php if(isset($a_category)){echo $a_category;}?>">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 分类管理
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="<?php echo U('Admin/Article/index');?>" class="<?php if(isset($a_article)){echo $a_article;}?>">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 文章管理
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="<?php echo U('Admin/Comment/index');?>" class="<?php if(isset($a_comment)){echo $a_comment;}?>">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 评论管理
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="<?php echo U('Admin/Record/index');?>" class="<?php if(isset($a_record)){echo $a_record;}?>">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 访问管理
                </a>
            </li>

        </ul>
    </div>


    <!-- 内容区域 -->
    
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">
                            <ol class="am-breadcrumb am-breadcrumb-slash">
                                <li><a href="<?php echo U('Admin/Index/index');?>" class="am-icon-home">首页</a></li>
                                <li><a href="<?php echo U('Admin/Comment/index');?>">评论管理</a></li>
                                <li class="am-active">评论列表</li>
                            </ol>
                        </div>
                    </div>
                    <div class="widget-body  am-fr">
                        <form method="get" action="">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                            </div>
                            <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" class="am-form-field " name="keyword"
                                           placeholder="请输入评论" value="<?php echo ($keyword); ?>">
                                    <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"
                    type="submit"></button>
          </span>
                                </div>
                            </div>
                        </form>
                        <div class="am-u-sm-12">
                            <table width="100%"
                                   class="am-table am-table-striped am-table-compact am-table-bordered am-table-radius tpl-table-black">
                                <thead>
                                <tr>
                                    <th>名称</th>
                                    <th>邮箱</th>
                                    <th>文章标题</th>
                                    <th>评论内容</th>
                                    <th>状态</th>
                                    <th>ip</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($commentList)): foreach($commentList as $key=>$item): ?><tr>
                                        <td><?php echo ($item["name"]); ?></td>
                                        <td><?php echo ($item["email"]); ?></td>
                                        <td><a href="<?php echo U('Home/Index/article');?>/id/<?php echo ($item["art_id"]); ?>"
                                               class="am-badge am-badge-primary"><?php echo ($item["title"]); ?></a></td>
                                        <td><?php echo ($item["comment"]); ?></td>
                                        <td>
                                            <?php if(($item["status"] == 1)): ?><span class="am-badge am-badge-primary" style="cursor: pointer"
                                                      onclick="stateComment(<?php echo ($item["id"]); ?>)">显示</span>
                                                <?php else: ?>
                                                <span class="am-badge am-badge-danger" style="cursor: pointer"
                                                      onclick="stateComment(<?php echo ($item["id"]); ?>)">隐藏</span><?php endif; ?>
                                        </td>
                                        <td><?php echo ($item["ip"]); ?></td>
                                        <td><?php echo (substr($item["create_time"],0,10)); ?></td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;" class="tpl-table-black-operation-del"
                                                   onclick="deleteComment(<?php echo ($item["id"]); ?>)">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; ?>

                                <!-- more data -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //删除文章
    function deleteComment(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo U('Admin/Comment/delete');?>",
            data: {id: id},
            async: false,
            success: function (data) {
                if (data.code == 200) {
                    location.reload()
                } else {
                    alert(data.msg)
                }
            }
        })
    }

    //修改评论状态
    function stateComment(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo U('Admin/Comment/state');?>",
            data: {id: id},
            async: false,
            success: function (data) {
                if (data.code == 200) {
                    location.reload()
                } else {
                    alert(data.msg)
                }
            }
        })
    }
</script>
</div>
</div>
<script src="/Public/admin/js/amazeui.min.js"></script>
<script src="/Public/admin/js/amazeui.datatables.min.js"></script>
<script src="/Public/admin/js/dataTables.responsive.min.js"></script>
<script src="/Public/admin/js/app.js"></script>
<script>
    //用户退出
    function logout() {
        $.ajax({
            type: 'post',
            url: "<?php echo U('Admin/Account/logout');?>",
            async: false,
            data: {logout: '1'},
            success: function (data) {
                if (data.code == 200) {
                    location.reload()
                }
            }
        })
    }
</script>
</body>

</html>