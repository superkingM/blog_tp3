<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>渡目博客</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="/Public/blog/i/favicon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/Public/blog/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/Public/blog/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="/Public/blog/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/Public/blog/css/amazeui.min.css">
  <link rel="stylesheet" href="/Public/blog/css/app.css">
</head>

<body id="blog">
<nav class="am-g am-g-fixed blog-fixed blog-nav">
  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="<?php if(isset($a_home)){echo $a_home;}?>"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
      <?php if(is_array($categoryList)): foreach($categoryList as $key=>$item): ?><li class="<?php echo ($item["active"]); ?>"><a href="<?php echo U('Home/Index/category');?>/id/<?php echo ($item["id"]); ?>"><?php echo ($item["category_name"]); ?></a></li><?php endforeach; endif; ?>
    </ul>
    <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
      </div>
    </form>
  </div>
</nav>
<hr>


<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
  
<div class="am-u-md-8 am-u-sm-12">
    <?php if(is_array($articleList)): foreach($articleList as $key=>$item): ?><article class="am-g blog-entry-article">
            <div class="blog-entry-text">
                <span><a href="<?php echo U('Home/Index/category');?>/id/<?php echo ($item["category_id"]); ?>" class="blog-color"><?php echo ($item["category_name"]); ?></a></span>
                <span> @<?php echo ($item["author"]); ?></span>
                <span><?php echo (substr($item["create_time"],0,10)); ?></span>
                <h1><a href="<?php echo U('Home/Index/article');?>/id/<?php echo ($item["id"]); ?>"><?php echo ($item["title"]); ?></a></h1>
                <p><?php echo ($item["summary"]); ?></p>
                <p><a href="" class="blog-continue">continue reading</a></p>
            </div>
        </article><?php endforeach; endif; ?>
    <ul class="am-pagination">
        <li class="am-pagination-prev"><a href="<?php echo U('Home/Index/index');?>?page=<?php echo ($prev); ?>">&laquo; 上一页</a></li>
        <li class="am-pagination-next"><a href="<?php echo U('Home/Index/index');?>?page=<?php echo ($next); ?>">下一页 &raquo;</a></li>
    </ul>
</div>

  <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
    <div class="blog-sidebar-widget blog-bor">
      <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
      <img src="/Public/blog/i/f14.jpg" alt="about me" class="blog-entry-img" >
      <p>ThinkPHP3.2.5</p>
      <p>
        博客系统
      </p><p></p>
    </div>
    <div class="blog-sidebar-widget blog-bor">
      <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
      <p>
        <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
        <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>
        <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
        <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
        <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
      </p>
    </div>
    <!--<div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
      <h2 class="blog-title"><span>TAG cloud</span></h2>
      <div class="am-u-sm-12 blog-clear-padding">
        <a href="" class="blog-tag">amaze</a>
        <a href="" class="blog-tag">妹纸 UI</a>
        <a href="" class="blog-tag">HTML5</a>
        <a href="" class="blog-tag">这是标签</a>
        <a href="" class="blog-tag">Impossible</a>
        <a href="" class="blog-tag">开源前端框架</a>
      </div>
    </div>-->
    <div class="blog-sidebar-widget blog-bor">
      <h2 class="blog-title"><span>最热文章</span></h2>
      <ul class="am-list">
        <?php if(is_array($hotArticleList)): foreach($hotArticleList as $key=>$item): ?><li><a href="<?php echo U('Home/Index/article');?>/id/<?php echo ($item["id"]); ?>"><?php echo ($item["title"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
    <div class="blog-sidebar-widget blog-bor">
      <h2 class="blog-title"><span>最新评论</span></h2>
      <ul class="am-list">
        <?php if(is_array($latestCommentList)): foreach($latestCommentList as $key=>$item): ?><li><a href="<?php echo U('Home/Index/article');?>/id/<?php echo ($item["article_id"]); ?>"><?php echo ($item["comment"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</div>
<!-- content end -->





<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/blog/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="/Public/admin/js/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/blog/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/Public/blog/js/amazeui.min.js"></script>
<!-- <script src="assets/js/app.js"></script> -->
</body>
</html>