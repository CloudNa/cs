<?php
/**
 *shop商城系统
 */

namespace addon\memberwithdraw\admin\controller;

use app\admin\controller\BaseAdmin;
use addon\memberwithdraw\model\Withdraw as WithdrawModel;

/**
 * 会员提现
 */
class Withdraw extends BaseAdmin
{

    /**
     * 转账
     */
    public function transfer(){
        if(request()->isAjax()){
            $id = input('id', 0);

            $withdraw_model = new WithdrawModel();

            $result = $withdraw_model->transfer($id);
            return $result;
        }
    }

}