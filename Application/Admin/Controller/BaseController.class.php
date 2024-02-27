<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    /** @var int 接口状态码 */
    protected $code = 200;
    /** @var string 接口提示信息 */
    protected $msg = 'ok';
    /** @var array 数据 */
    protected $data = [];

    public function _initialize()
    {
        if (!session('admin')) {
            $this->redirect('Admin/Account/login');
        }
    }

    /**
     * 成功
     * @param $data array
     * @return null
     */
    protected function jsonSuccess($data = [])
    {
        $this->data = $data;
        return $this->json();
    }

    /**
     * 数据和提示
     * @param $data array
     * @param $msg string
     * @return null
     */
    protected function jsonSuccessMsg($data, $msg)
    {
        $this->data = $data;
        $this->msg = $msg;
        return $this->json();
    }

    /**
     * 初始
     * @return null
     */
    protected function json()
    {
        return $this->ajaxReturn([
            'code' => $this->code,
            'msg' => $this->msg,
            'data' => $this->data
        ]);
    }

    /**
     * 错误
     * @param $msg string
     * @return null
     */
    protected function jsonError($msg)
    {
        $this->code = 500;
        $this->msg = $msg;
        return $this->json();
    }
}