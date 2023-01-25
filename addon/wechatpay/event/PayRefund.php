<?php
/**
 * shop多商户商城
 */


namespace addon\wechatpay\event;

use addon\wechatpay\model\Pay as PayModel;
/**
 * 原路退款
 */
class PayRefund
{
    /**
     * 原路退款
     */
    public function handle($params)
    {
        if($params["pay_info"]["pay_type"] == "wechatpay"){
            $pay_model = new PayModel();
            $result = $pay_model->refund($params);
            return $result;
        }
    }
}