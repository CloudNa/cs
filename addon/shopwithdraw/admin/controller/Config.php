<?php
/**
 *shop商城系统
 */

namespace addon\shopwithdraw\admin\controller;

use app\admin\controller\BaseAdmin;
use addon\shopwithdraw\model\Config as ConfigModel;
use addon\shopwithdraw\model\Withdraw as WithdrawModel;

/**
 * 会员提现
 */
class Config extends BaseAdmin
{
    /**
     * 会员提现配置
     */
    public function index()
    {
        $config_model = new ConfigModel();
        if (request()->isAjax()) {

            if (empty(input("transfer_type"))) {
                $transfer_type = "";
            } else {
                $transfer_type = implode(",", input("transfer_type"));
            }
            //订单提现
            $data = [
                'transfer_type' => $transfer_type,//转账方式,
            ];
            $this->addLog("设置店铺提现配置");
            $is_use = input("is_use", 0);//是否启用
            $res = $config_model->setConfig($data, $is_use);
            return $res;
        } else {

            //会员提现
            $config_result = $config_model->getConfig();
            $this->assign('config', $config_result[ 'data' ]);
            $withdraw_model = new WithdrawModel();
            $transfer_type_list = $withdraw_model->getTransferType();
            $this->assign("transfer_type_list", $transfer_type_list);
            return $this->fetch('config/index');
        }
    }

}