<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;

class CategoryController extends BaseController
{
    public function _initialize()
    {
        $this->assign('a_category', 'active');
        parent::_initialize();
    }
    /**
     * 分类列表
     * @return void
     */
    public function index()
    {
        $categoryModel = D('Category');
        $list = $categoryModel->select();
        $this->assign('list', $list);
        $this->display();
    }
}