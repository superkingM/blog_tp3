<?php

namespace Admin\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        session('admin', null);
        $this->display();
    }
}