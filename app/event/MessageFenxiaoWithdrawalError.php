<?php
/**
 * shop多商户商城
 */

namespace app\event;

use addon\fenxiao\model\FenxiaoWithdraw;

/**
 *  分销提现失败发送消息
 */
class MessageFenxiaoWithdrawalError
{
    /**
     * @param $param
     */
    public function handle($param)
    {
        //发送订单消息
        if ($param["keywords"] == "FENXIAO_WITHDRAWAL_ERROR") {
            //发送订单消息
            $model = new FenxiaoWithdraw();
            return $model->messageFenxiaoWithdrawalError($param);
        }
    }

}