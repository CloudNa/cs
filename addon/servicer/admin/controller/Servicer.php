<?php

/**
 *shop商城系统
 */

namespace addon\servicer\admin\controller;

use app\admin\controller\BaseAdmin;
use app\model\system\User;
use app\model\system\Group;
use addon\servicer\model\Servicer as ServicerModel;

/**
 * 客服
 */
class Servicer extends BaseAdmin
{
    /**
     * 客服列表
     */
    public function index()
    {
        $field_list = [
            's.nickname' => '客服昵称',
            'u.username' => '客服账号'
        ];
        if (request()->isAjax()) {
            $page        = input('page', 1);
            $page_size   = input('page_size', PAGE_LIST_ROWS);
            $status      = input('status', '');
            $search_type = input('search_type', '');
            $search_text = input('search_text', '');

            $condition = [
                ['u.site_id', '=', 0],
                ['u.app_module', '=', 'servicer'],
            ];
            if ($status !== '') {
                $condition[] = ['u.status', '=', $status];
            }
            if (!empty($search_text) && array_key_exists($search_type, $field_list)) {
                $condition[] = [$search_type, 'like', '%' . $search_text . '%'];
            }

            $alias = 's';
            $join  = [
                ['user u', 'u.uid = s.user_id', 'inner']
            ];
            $order = 's.id desc';
            $field = [
                's.id, s.nickname, s.avatar',
                'u.uid, u.group_name, u.username, u.status, u.login_time'
            ];

            $servicer_model = new ServicerModel();
            $res            = $servicer_model->getPageList($condition, $page, $page_size, $order, $field, $alias, $join);
            return $res;
        } else {
            $this->assign([
                // 筛选字段
                'field_list' => $field_list
            ]);
            return $this->fetch('servicer/list');
        }
    }

    /**
     * 添加客服
     */
    public function add()
    {
        $app_module = 'servicer';
        if (request()->isAjax()) {
            $servicer_model = new ServicerModel();
            return $servicer_model->add([
                'username'   => input('username', '', 'trim'),
                'password'   => input('password', '123456', 'trim'),
                'group_id'   => input('group_id', 0),
                'app_module' => $app_module,
                'site_id'    => 0,
            ], [
                'nickname' => input('nickname', '', 'trim'),
                'avatar'   => input('avatar', ''),
            ]);
        } else {
            $group_model = new Group();
            $this->assign([
                // 客服组
                'group_list' => $group_model->getGroupList([['site_id', '=', 0], ['app_module', '=', $app_module]], 'group_id, group_name')['data']
            ]);
            return $this->fetch('servicer/add');
        }
    }

    /**
     * 编辑客服
     */
    public function edit()
    {
        $app_module     = 'servicer';
        $servicer_model = new ServicerModel();
        if (request()->isAjax()) {
            return $servicer_model->edit([
                'group_id' => input('group_id', 0),
                'status'   => input('status', 0),
            ], [
                ['site_id', '=', 0],
                ['app_module', '=', $app_module],
                ['uid', '=', input('uid', 0)]
            ], [
                'nickname' => input('nickname', '', 'trim'),
                'avatar'   => input('avatar', ''),
            ]);
        } else {
            $info = $servicer_model->getDetail([
                ['shop_id', '=', 0],
                ['user_id', '=', input('uid', 0)],
            ])['data'];
            if (empty($info)) {
                $this->error('客服不存在');
            }

            $group_model = new Group();
            $this->assign([
                'info'       => $info,
                // 客服组
                'group_list' => $group_model->getGroupList([['site_id', '=', 0], ['app_module', '=', $app_module]], 'group_id, group_name')['data']
            ]);
            return $this->fetch('servicer/edit');
        }
    }

    /**
     * 修改用户状态
     */
    public function modifyUserStatus()
    {
        if (request()->isAjax()) {
            $user_model = new User();
            return $user_model->modifyUserStatus(input('status', 0), [
                ['uid', '=', input('uid', 0)],
                ['site_id', '=', 0],
                ['app_module', '=', 'servicer'],
            ]);
        }
    }

    /**
     * 重置密码
     */
    public function modifyPassword()
    {
        if (request()->isAjax()) {
            $user_model = new User();
            return $user_model->modifyUserPassword(input('password', '123456', 'trim'), [
                ['uid', '=', input('uid', 0)],
                ['site_id', '=', 0],
                ['app_module', '=', 'servicer'],
            ]);
        }
    }

    /**
     * 删除客服
     */
    public function delete()
    {
        if (request()->isAjax()) {
            $servicer_model = new ServicerModel();
            return $servicer_model->delete(0, input('uid', 0));
        }
    }
}
