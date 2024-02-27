<?php

namespace Admin\Controller;

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