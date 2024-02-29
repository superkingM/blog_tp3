<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;
/**
 * 文章相关控制器
 */
class ArticleController extends BaseController
{
    public function _initialize()
    {
        $this->assign('a_article', 'active');
        parent::_initialize();
    }

    /**
     * 文章列表
     * @return void
     */
    public function index()
    {
        if (IS_GET) {
            $categoryModel = D('Category');
            $categoryList = $categoryModel->select();
            $categoryId = I('get.category_id', -1);
            $keyword = I('get.keyword', '');

            $articleModel = D('Article');
            $articleModel->join('LEFT JOIN category ON article.category_id = category.id');
            $whereMap = ['delete_at' => ['eq' , 0]];
            if ($categoryId != -1) {
                $whereMap['category_id'] = ['eq', $categoryId];
            }
            if ($keyword) {
                $whereMap['title'] = ['like', '%' . $keyword . '%'];
            }
            $articleModel->where($whereMap);
            $list = $articleModel->field('article.*,category.category_name')->order('create_time desc')->select();
            $this->assign('list', $list);
            $this->assign('keyword', $keyword);
            $this->assign('categoryId', $categoryId);
            $this->assign('categoryList', $categoryList);
            $this->display();
        } else {
            $this->error('请求错误');
        }

    }

    /**
     * 新增文章
     * @return void
     */
    public function add()
    {
        $categoryModel = D('Category');
        $categoryList = $categoryModel->select();
        if (IS_GET) {
            $this->assign('categoryList', $categoryList);
            $this->display();
        } else {
            $title = I('post.title', 'title');
            $summary = I('post.summary');
            $show = I('post.show');
            $categoryId = I('post.category_id');
            $content = I('post.content');
            if ($show == 'on') {
                $show = 1;
            } else {
                $show = 0;
            }
            $articleModel = D('Article');
            $articleModel->add([
                'title' => $title,
                'summary' => $summary,
                'category_id' => $categoryId,
                'content' => $content,
                'show' => $show,
                'view' => 0,
                'create_time' => date('Y-m-d H:i:s'),
                'author' => session('admin.account')
            ]);
            $this->redirect('Admin/Article/index');
        }
    }

    /**
     * 编辑文章
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $categoryModel = D('Category');
        $categoryList = $categoryModel->select();
        $articleModel = D('Article');
        $article = $articleModel->find($id);
        if ($article) {
            $article['content'] = htmlspecialchars_decode($article['content']);
        }
        if (IS_POST) {
            $title = I('post.title', 'title');
            $summary = I('post.summary');
            $show = I('post.show');
            $categoryId = I('post.category_id');
            $content = I('post.content');
            if ($show == 'on') {
                $show = 1;
            } else {
                $show = 0;
            }
            $articleModel->where(['id' => $id])->save(
                [
                    'title' => $title,
                    'summary' => $summary,
                    'category_id' => $categoryId,
                    'content' => $content,
                    'show' => $show
                ]
            );
            $this->redirect('Admin/Article/index');
        } else {
            $this->assign('categoryList', $categoryList);
            $this->assign('article', $article);
            $this->display();
        }
    }

    /**
     * 删除文章
     * @return void
     */
    public function delete()
    {
        if (IS_POST) {
            $id = I('post.id');
            $articleModel = D('Article');
            $articleModel->where(['id' => $id])->save(['delete_at' => 1]);
            $this->json();
        } else {
            $this->error('请求错误');
        }
    }
}