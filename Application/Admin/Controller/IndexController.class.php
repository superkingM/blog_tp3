<?php

namespace Admin\Controller;
/**
 * 后台默认控制器
 */
class IndexController extends BaseController
{
    public function _initialize()
    {
        $this->assign('a_index', 'active');
        parent::_initialize();
    }

    public function index()
    {
        $this->display();
    }
}