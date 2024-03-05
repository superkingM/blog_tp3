<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;
/**
 * 访问管理类
 */
class RecordController extends BaseController
{
    public function _initialize()
    {
        $this->assign('a_record', 'active');
        parent::_initialize();
    }

    /**
     * 访问管理
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
        $recordModel = D('Record');
        $recordList = $recordModel->limit(20)->page($page)->order('create_time')->select();
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->assign('recordList', $recordList);
        $this->display();
    }
}