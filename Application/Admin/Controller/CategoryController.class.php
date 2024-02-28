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

    /**
     * 新增分类
     * @return void
     */
    public function add()
    {
        if (IS_POST) {
            $categoryName = I('post.category_name');
            $categoryDescription = I('post.category_description');
            $displayStatus = I('post.display_status');
            $categoryModel = D('Category');
            $category = $categoryModel->where(['category_name' => $categoryName])->find();
            if ($category) {
                $this->error('此分类已经存在，不能重复添加');
            }
            if ($displayStatus == 'on') {
                $displayStatus = 1;
            } else {
                $displayStatus = 0;
            }
            $categoryModel->add([
                'category_name' => $categoryName,
                'category_description' => $categoryDescription,
                'display_status' => $displayStatus
            ]);
            $this->redirect('Admin/Category/index');
        } else {
            $this->display();
        }
    }

    /**
     * 编辑分类
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $categoryModel = D('Category');
        if (IS_POST) {
            $categoryName = I('post.category_name');
            $categoryDescription = I('post.category_description');
            $displayStatus = I('post.display_status');
            $category = $categoryModel->where(['id' => ['neq', $id], 'category_name' => $categoryName])->find();
            if ($category) {
                $this->error('此分类已经存在，不能修改成此分类');
            }
            if ($displayStatus == 'on') {
                $displayStatus = 1;
            } else {
                $displayStatus = 0;
            }
            $categoryModel->where(['id' => $id])->save([
                'category_name' => $categoryName,
                'category_description' => $categoryDescription,
                'display_status' => $displayStatus
            ]);
            $this->redirect('Admin/Category/index');
        } else {
            $category = $categoryModel->where(['id' => $id])->find();
            $this->assign('category', $category);
            $this->display();
        }
    }

    /**
     * 删除分类
     * @return void
     */
    public function delete()
    {
        if (IS_POST) {
            $id = I('post.id');
            $articleModel = D('Article');
            $article = $articleModel->where(['category_id' => $id])->find();
            if ($article) {
                $this->jsonError('此分类下有关联文章不能删除');
            }
            $categoryModel = D('Category');
            $categoryModel->where(['id' => $id])->delete();
            $this->json();
        } else {
            $this->error('请求错误');
        }

    }
}