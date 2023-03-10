<?php
/**
 *shop商城系统
 */

namespace app\shop\controller;

use app\model\member\Member;
use app\model\shop\ShopAcceptMessage as ShopAcceptMessageModel;

/**
 * 消息通知
 * Class Message
 * @package app\shop\controller
 */
class Shopacceptmessage extends BaseShop
{

    /**
     * 列表
     */
    public function lists()
    {
        if (request()->isAjax()) {

            $page = input('page', 1);
            $page_size = input('page_size', PAGE_LIST_ROWS);

            $condition = [
                [ 'sam.site_id', '=', $this->site_id ]
            ];
            //手机号
            $mobile = input('mobile', '');
            if ($mobile != '') {
                $condition[] = [ 'm.mobile', '=', $mobile ];
            }

            $model = new ShopAcceptMessageModel();
            $list = $model->getShopAcceptMessagePageList($condition, $page, $page_size);
            return $list;
        } else {

            return $this->fetch('shopacceptmessage/lists');
        }
    }


    /**
     * 添加
     */
    public function add()
    {
        if (request()->isAjax()) {

            $model = new ShopAcceptMessageModel();

            $member_id = input('member_id', 0);
            $res = $model->addShopAcceptMessage($member_id, $this->site_id);
            return $res;
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        if (request()->isAjax()) {

            $model = new ShopAcceptMessageModel();

            $member_id = input('member_id', 0);
            $res = $model->deleteShopAcceptMessage([ [ 'member_id', '=', $member_id ], [ 'site_id', '=', $this->site_id ] ]);
            return $res;
        }

    }

    /**
     *  会员列表
     */
    public function memberList()
    {
        if (request()->isAjax()) {
            $page = input('page', 1);
            $page_size = input('page_size', PAGE_LIST_ROWS);
            $mobile = input('mobile', '');
            if ($mobile != '') {
                $condition = [
                    [ 'mobile', '=', $mobile ]
                ];
                $field = 'member_id,headimg,nickname,mobile,email,wx_openid';

                $member_model = new Member();
                $list = $member_model->getMemberPageList($condition, $page, $page_size, '', $field);
                return $list;
            } else {
                $list = [
                    'code' => 0,
                    'message' => '操作成功',
                    'data' => [ 'count' => 0, 'page_count' => 0, 'list' => [] ]
                ];
                echo json_encode($list);
            }

        } else {
            return $this->fetch('shopacceptmessage/member_list');
        }
    }
}