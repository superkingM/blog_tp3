<?php
/**
 * @author: superkingM
 * @version 3.2.5
 */

namespace Admin\Controller;
/**
 * 评论管理
 */
class CommentController extends BaseController
{
    public function _initialize()
    {
        $this->assign('a_comment', 'active');
        parent::_initialize();
    }

    /**
     * 评论列表
     * @return void
     */
    public function index()
    {
        $keyword = I('get.keyword', '');
        $commentModel = D('Comment');
        if ($keyword) {
            $commentList = $commentModel->join('LEFT JOIN article ON comment.article_id = article.id')->where(['comment' => ['like', '%' . $keyword . '%']])->order('create_time desc')->field('comment.*,article.title,article.id as art_id')->select();
        }else{
            $commentList = $commentModel->join('LEFT JOIN article ON comment.article_id = article.id')->order('create_time desc')->field('comment.*,article.title,article.id as art_id')->select();
        }
        $this->assign('commentList', $commentList);
        $this->assign('keyword', $keyword);
        $this->display();
    }

    /**
     * 删除评论
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $commentModel = D('Comment');
        $commentModel->where(['id' => $id])->delete();
        $this->json();
    }

    /**
     * 修改评论状态
     * @return void
     */
    public function state()
    {
        $id = I('post.id');
        $commentModel = D('Comment');
        $comment = $commentModel->where(['id' => $id])->find();
        if ($comment) {
            if ($comment['status'] == 1) {
                $commentModel->where(['id' => $id])->save(['status' => 0]);
            } else {
                $commentModel->where(['id' => $id])->save(['status' => 1]);
            }
            $this->json();
        } else {
            $this->jsonError('此评论不存在');
        }
    }
}