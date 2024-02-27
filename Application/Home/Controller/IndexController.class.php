<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        /*$category = D('Category');
        $categoryList = $category->select();
        $this->ajaxReturn($categoryList);*/
        $this->assign('title', '这是一个标题');
        $this->display();
    }
}