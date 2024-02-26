<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        if (!session('admin')) {
            $this->redirect('Admin/Account/login');
        }
    }

}