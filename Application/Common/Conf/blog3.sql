SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '文章标题',
  `summary` varchar(500) DEFAULT '' COMMENT '概要',
  `category_id` int(11) DEFAULT NULL COMMENT '分类关联ID',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `content` mediumtext COMMENT '文章内容',
  `show` int(4) DEFAULT '1' COMMENT '是否显示1:显示0：隐藏',
  `view` bigint(20) DEFAULT '0' COMMENT '浏览量',
  `delete_at` int(4) DEFAULT '0' COMMENT '是否删除1：已删除0：未删除',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='文章表';

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT '' COMMENT '分类名称',
  `category_description` varchar(255) DEFAULT '' COMMENT '分类描述',
  `display_status` int(4) DEFAULT '1' COMMENT '显示状态：0：不可见，1：可见',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='分类表';

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `comment` varchar(255) DEFAULT NULL COMMENT '评论',
  `status` int(4) DEFAULT '1' COMMENT '状态：0：隐藏1：显示',
  `ip` varchar(100) DEFAULT NULL COMMENT 'ip',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for record
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) DEFAULT NULL COMMENT '访问地址',
  `user_agent` varchar(500) DEFAULT NULL COMMENT '客户端',
  `ip` varchar(100) DEFAULT NULL COMMENT 'IP地址',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) DEFAULT NULL COMMENT '账号',
  `password` varchar(100) DEFAULT NULL COMMENT '密码',
  `nick_name` varchar(50) DEFAULT NULL COMMENT '昵称',
  `status` int(4) DEFAULT '1' COMMENT '账户状态：0:停用，1:启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$/348oe.7zcgVAaIJKxyJXOW62eC7DGpC1uh.O/8Ct/LhDnYuHCj62', 'admin', '1');
