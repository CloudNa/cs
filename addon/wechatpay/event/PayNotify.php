<?php
/**
 * shop多商户商城
 */

namespace addon\wechatpay\event;

use addon\wechatpay\model\Pay as PayModel;

/**
 * 支付回调
 */
class PayNotify
{
    /**
     * 支付方式及配置
     */
    public function handle($param = [])
    {
        try {
            $pay_model = new PayModel();
            $pay_model->payNotify();
        } catch (\Exception $e) {
            return '';
        }
    }
}