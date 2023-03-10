<?php
/**
 * shop多商户商城
 */


namespace addon\wechatpay\event;

use addon\wechatpay\model\Pay;
class PayTransfer
{
    public function handle(array $params){
        if ($params['transfer_type'] == 'wechatpay') {
            $is_weapp = $params['is_weapp'] ?? 0;
            $pay = new Pay($is_weapp);
            $res = $pay->transfer($params);
            return $res;
        }
    }
}