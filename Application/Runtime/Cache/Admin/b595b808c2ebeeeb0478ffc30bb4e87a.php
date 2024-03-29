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

        </ul>
    </div>


    <!-- 内容区域 -->
    
<div class="tpl-content-wrapper">

    <div class="container-fluid am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 部件首页 <small>Amaze UI</small></div>
                <p class="page-header-description">Amaze UI 含近 20 个 CSS 组件、20 余 JS 组件，更有多个包含不同主题的 Web 组件。</p>
            </div>
            <div class="am-u-lg-3 tpl-index-settings-button">
                <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>
            </div>
        </div>

    </div>

    <div class="row-content am-cf">
        <div class="row  am-cf">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">月度财务收支计划</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <div class="am-fl">
                            <div class="widget-fluctuation-period-text">
                                ￥61746.45
                                <button class="widget-fluctuation-tpl-btn">
                                    <i class="am-icon-calendar"></i>
                                    更多月份
                                </button>
                            </div>
                        </div>
                        <div class="am-fr am-cf">
                            <div class="widget-fluctuation-description-amount text-success" am-cf>
                                +￥30420.56

                            </div>
                            <div class="widget-fluctuation-description-text am-text-right">
                                8月份收入
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                <div class="widget widget-primary am-cf">
                    <div class="widget-statistic-header">
                        本季度利润
                    </div>
                    <div class="widget-statistic-body">
                        <div class="widget-statistic-value">
                            ￥27,294
                        </div>
                        <div class="widget-statistic-description">
                            本季度比去年多收入 <strong>2593元</strong> 人民币
                        </div>
                        <span class="widget-statistic-icon am-icon-credit-card-alt"></span>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                <div class="widget widget-purple am-cf">
                    <div class="widget-statistic-header">
                        本季度利润
                    </div>
                    <div class="widget-statistic-body">
                        <div class="widget-statistic-value">
                            ￥27,294
                        </div>
                        <div class="widget-statistic-description">
                            本季度比去年多收入 <strong>2593元</strong> 人民币
                        </div>
                        <span class="widget-statistic-icon am-icon-support"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row am-cf">
            <div class="am-u-sm-12 am-u-md-8">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">月度财务收支计划</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body-md widget-body tpl-amendment-echarts am-fr" id="tpl-echarts">

                    </div>
                </div>
            </div>

            <div class="am-u-sm-12 am-u-md-4">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">专用服务器负载</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body widget-body-md am-fr">

                        <div class="am-progress-title">CPU Load <span class="am-fr am-progress-title-more">28% / 100%</span></div>
                        <div class="am-progress">
                            <div class="am-progress-bar" style="width: 15%"></div>
                        </div>
                        <div class="am-progress-title">CPU Load <span class="am-fr am-progress-title-more">28% / 100%</span></div>
                        <div class="am-progress">
                            <div class="am-progress-bar  am-progress-bar-warning" style="width: 75%"></div>
                        </div>
                        <div class="am-progress-title">CPU Load <span class="am-fr am-progress-title-more">28% / 100%</span></div>
                        <div class="am-progress">
                            <div class="am-progress-bar am-progress-bar-danger" style="width: 35%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row am-cf">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4 widget-margin-bottom-lg ">
                <div class="tpl-user-card am-text-center widget-body-lg">
                    <div class="tpl-user-card-title">
                        禁言小张
                    </div>
                    <div class="achievement-subheading">
                        月度最佳员工
                    </div>
                    <img class="achievement-image" src="/Public/admin/img/user07.png" alt="">
                    <div class="achievement-description">
                        禁言小张在
                        <strong>30天内</strong> 禁言了
                        <strong>200多</strong>人。
                    </div>
                </div>
            </div>

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-8 widget-margin-bottom-lg">

                <div class="widget am-cf widget-body-lg">

                    <div class="widget-body  am-fr">
                        <div class="am-scrollable-horizontal ">
                            <table width="100%" class="am-table am-table-compact am-text-nowrap tpl-table-black " id="example-r">
                                <thead>
                                <tr>
                                    <th>文章标题</th>
                                    <th>作者</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>新加坡大数据初创公司 Latize 获 150 万美元风险融资</td>
                                    <td>张鹏飞</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>自拍的“政治角色”：观众背对希拉里自拍合影表示“支持”</td>
                                    <td>天纵之人</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gradeX">
                                    <td>关于创新管理，我想和你当面聊聊。</td>
                                    <td>王宽师</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>究竟是趋势带动投资，还是投资引领趋势？</td>
                                    <td>着迷</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争</td>
                                    <td>醉里挑灯看键</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>


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