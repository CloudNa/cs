<?php
/**
 * shop多商户商城
 */


namespace addon\niusms\event;

use addon\niusms\model\Sms;

/**
 * 短信发送
 */
class SendSms
{
    /**
     * 短信发送方式方式及配置
     * @param $param
     * @return array|mixed
     * @throws \Overtrue\EasySms\Exceptions\InvalidArgumentException
     */
    public function handle($param)
    {
        $sms = new Sms();
        $res = $sms->send($param);
        return $res;
    }
}