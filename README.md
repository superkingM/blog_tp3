## ThinkPHP3.2.5简单博客系统

一个使用ThinkPHP3.2.5和bootstrap3搭建的博客系统

## 支持功能

### 后台管理

- [x] 用户登录
- [X] 分类管理
- [x] 文章管理
- [x] 评论管理
- [x] 访问记录

### 前端页面

- [x] 分类导航
- [x] 文章列表
- [x] 文章详情
- [x] 最热文章
- [x] 最新评论

### 数据库导入

> 将Application/Common/Conf/blog3.sql导入到mysql数据库，并在当前所在目录config.php配置数据连接

- 前端地址:`host/index.php/Home/Index/index`
- 后台地址:`host/index.php/Admin/Index/index`
- 后台管理员: admin
- 后台密码: 123456

## 页面效果

### 前端

- 首页和分类页文章列表

![首页和分类页文章列表](/Public/pic/index.png)

- 文章详细页

![文章详细页](/Public/pic/article.png)

### 后端

- 分类管理
  ![分类管理](/Public/pic/cate.png)
- 文章管理
  ![文章管理](/Public/pic/admin_article.png)
  ![新增、编辑文章](/Public/pic/add_article.png)
- 评论管理
  ![评论管理](/Public/pic/comment.png)
- 访问记录
  ![访问记录](/Public/pic/record.png)