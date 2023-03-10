<?php
/**
 * shop多商户商城
 */

namespace app\api\controller;

use app\model\member\MemberAccount as MemberAccountModel;
use app\model\member\Member as MemberModel;

class Memberaccount extends BaseApi
{

    /**
     * 基础信息
     */
    public function info()
    {
        $token = $this->checkToken();
        if ($token['code'] < 0) return $this->response($token);
        $account_type = isset($this->params['account_type']) ? $this->params['account_type'] : 'balance,balance_money'; //账户类型 余额:balance，积分:point

        if (!in_array($account_type, ['point', 'balance', 'balance,balance_money'])) return $this->response($this->error('', 'INVALID_PARAMETER'));

        $member_model = new MemberModel();
        $info = $member_model->getMemberInfo([['member_id', '=', $token['data']['member_id']]], $account_type);
        return $this->response($info);
    }

    /**
     * 列表信息
     */
    public function page()
    {
        $token = $this->checkToken();
        if ($token['code'] < 0) return $this->response($token);

        $page = isset($this->params['page']) ? $this->params['page'] : 1;
        $page_size = isset($this->params['page_size']) ? $this->params['page_size'] : PAGE_LIST_ROWS;
        $account_type = isset($this->params['account_type']) ? $this->params['account_type'] : 'balance,balance_money';//账户类型 余额:balance，积分:point
        $start_time = empty($this->params['date']) ? strtotime(date('Y-m', strtotime("today"))) : strtotime($this->params['date']);
        $end_time = strtotime("+1 month", $start_time);
        $from_type = isset($this->params['from_type']) ? $this->params['from_type'] : '';
        if (!in_array($account_type, ['point', 'balance', 'balance,balance_money'])) return $this->response($this->error('', 'INVALID_PARAMETER'));

        $condition[] = ['account_type', 'in', $account_type];
        $condition[] = ['member_id', '=', $token['data']['member_id']];
        $condition[] = ['create_time', 'between', [$start_time, $end_time]];
        if (!empty($from_type)) {
            $condition[] = ['from_type', '=', $from_type];
        }

        $member_account_model = new MemberAccountModel();
        $list = $member_account_model->getMemberAccountPageList($condition, $page, $page_size);
        return $this->response($list);
    }

    /**
     * 获取类型
     * @return false|string
     */
    public function fromType()
    {
        $member_account_model = new MemberAccountModel();
        $lists = $member_account_model->getFromType();
        return $this->response($lists);
    }

    /**
     * 获取账户总额
     */
    public function sum()
    {
        $token = $this->checkToken();
        if ($token['code'] < 0) return $this->response($token);

        $account_type = $this->params['account_type'] ?? 'point'; // 账户类型 余额:balance，积分:point
        $from_type = $this->params['from_type'] ?? '';
        $query_type = $this->params['query_type'] ?? ''; // 查询类型 收入：income 支出：pay
        $start_time = $this->params['start_time'] ?? 0;
        $end_time = $this->params['end_time'] ?? 0;

        if (!in_array($account_type, ['point', 'balance', 'balance_money', 'growth'])) return $this->response($this->error('', 'INVALID_PARAMETER'));

        $member_account_model = new MemberAccountModel();
        $condition = [
            ['member_id', '=', $this->member_id],
            ['account_type', '=', $account_type]
        ];
        if (!empty($from_type)) $condition[] = ['from_type', '=', $from_type];
        if ($query_type == 'income') $condition[] = ['account_data', '>', 0];
        if ($query_type == 'pay') $condition[] = ['account_data', '<', 0];
        if ($start_time && $end_time) $condition[] = ['create_time', 'between', [$start_time, $end_time]];
        $data = $member_account_model->getMemberAccountSum($condition, 'account_data');

        return $this->response($data);
    }

}