<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function _initialize()
    {
        $categoryModel = D('Category');
        $categoryList = $categoryModel->where(['display_status' => 1])->select();
        foreach ($categoryList as &$item) {
            $item['active'] = '';
        }
        $articleModel = D('Article');
        $hotArticleList = $articleModel->where(['show' => 1])->order('view desc')->limit(5)->select();

        $commentModel = D('Comment');
        $latestCommentList = $commentModel->join('article ON comment.article_id = article.id')->where(['article.delete_at' => 0])->limit(5)->select();
        $this->assign('latestCommentList', $latestCommentList);
        $this->assign('hotArticleList', $hotArticleList);
        $this->assign('categoryList', $categoryList);
    }

    /**
     * 首页
     * @return void
     */
    public function index()
    {
        $page = I('get.page', 1);
        if ($page == 1) {
            $prev = 1;
        } else {
            $prev = $page - 1;
        }
        $next = $page + 1;
        $articleModel = D('Article');
        $articleList = $articleModel->limit(10)
            ->page($page)
            ->join('LEFT JOIN category ON article.category_id = category.id')
            ->where(['show' => 1])
            ->field('article.*,category.category_name')
            ->select();
        $this->assign('a_home', 'am-active');
        $this->assign('articleList', $articleList);
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->display();
    }

    /**
     * 分类文章列表
     * @param $id
     * @return void
     */
    public function category($id)
    {
        $categoryModel = D('Category');
        $categoryList = $categoryModel->where(['display_status' => 1])->select();
        foreach ($categoryList as &$item) {
            if ($item['id'] == $id) {
                $item['active'] = 'am-active';
            } else {
                $item['active'] = '';
            }
        }
        $page = I('get.page', 1);
        if ($page == 1) {
            $prev = 1;
        } else {
            $prev = $page - 1;
        }
        $next = $page + 1;
        $articleModel = D('Article');
        $articleList = $articleModel->limit(10)
            ->page($page)
            ->join('LEFT JOIN category ON article.category_id = category.id')
            ->where(['show' => 1, 'category_id' => $id])
            ->field('article.*,category.category_name')
            ->select();
        $this->assign('articleList', $articleList);
        $this->assign('categoryList', $categoryList);
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->assign('id', $id);
        $this->display();
    }

    /**
     * 文章详情
     * @param $id
     * @return void
     */
    public function article($id)
    {
        $articleModel = D('Article');
        $article = $articleModel->join('LEFT JOIN category ON article.category_id = category.id')
            ->where(['show' => 1, 'article.id' => $id])
            ->field('article.*,category.category_name,category.id as cate_id')
            ->find();
        if (!$article) {
            $this->error('此文章不存在');
        } else {
            $commentModel = D('Comment');
            $commentList = $commentModel->where(['article_id' => $id, 'status' => 1])->select();
            $this->assign('commentList', $commentList);
            $articleModel->where(['id' => $id])->setInc('view');
            $content = htmlspecialchars_decode($article['content']);
            $this->assign('content', $content);
        }
        $this->assign('article', $article);
        $this->display();
    }

    /**
     * 文章评论
     * @param $id
     * @return void
     */
    public function comment($id)
    {
        if (IS_POST) {
            $params = I('post.');
            $name = I('post.name');
            $email = I('post.email');
            $comment = I('post.comment');
            if (empty($name)) {
                $this->error('请填写评论人');
            }
            if (empty($email)) {
                $this->error('请填写邮箱');
            }
            if (empty($comment)) {
                $this->error('请填写评论');
            }
            $commentModel = D('Comment');
            $commentModel->add([
                'article_id' => $id,
                'name' => $params['name'],
                'email' => $params['email'],
                'comment' => $params['comment'],
                'create_time' => date('Y-m-d H:i:s')
            ]);
            $this->redirect('Home/Index/article?id=' . $id);
        } else {
            $this->error('访问错误');
        }

    }
}