<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;

use Think\Controller;

class AccountController extends Controller
{
    public function _initialize()
    {
        $admin = session('admin');
        if ($admin) {
            $this->redirect('Admin/Index/index');
        }
    }

    public function login()
    {
        if (IS_POST) {
            $account = I('post.account');
            $password = I('post.password');
            $userModel = D('User');
            $user = $userModel->where(
                [
                    'account' => $account,
                    'status' => 1
                ]
            )->find();
            if (!$user) {
                $this->error('登录失败：用户名错误', U('Admin/Account/login'), 1);
            }
            $verify = password_verify($password, $user['password']);
            if (!$verify) {
                $this->error('登录失败：密码不正确', U('Admin/Account/login'), 1);
            }
            session('admin', [
                'id' => $user['id'],
                'account' => $user['account'],
                'nick_name' => $user['nick_name']
            ]);
            $this->redirect('Admin/Index/index');
        } else {
            $this->display();
        }
    }
}