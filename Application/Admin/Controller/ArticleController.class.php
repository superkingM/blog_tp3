<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;

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
            $whereMap = [];
            if ($categoryId != -1) {
                $whereMap['category_id'] = ['eq',$categoryId];
            }
            if ($keyword) {
                $whereMap['title'] = ['like', '%'.$keyword.'%'];
            }
            if (!empty($whereMap)) {
                $articleModel->where($whereMap);
            }
            $list = $articleModel->order('create_time desc')->select();
            $this->assign('list', $list);
            $this->assign('keyword', $keyword);
            $this->assign('categoryId', $categoryId);
            $this->assign('categoryList', $categoryList);
            $this->display();
        } else {
            $this->error('请求错误');
        }

    }
}