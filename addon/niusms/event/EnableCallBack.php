<?php
/**
 * shop多商户商城
 */

namespace addon\niusms\event;

use addon\niusms\model\Config;

/**
 * 使用这个短信，就要关闭其他短信插件
 */
class EnableCallBack
{
    /**
     * 短信发送方式方式及配置
     */
    public function handle($param)
    {
        if ($param[ 'sms_type' ] != 'niusms') {
            $param[ 'is_use' ] = 0;
            $config_model = new Config();
            $sms_config = $config_model->getSmsConfig();
            $is_use = $sms_config[ 'data' ][ 'is_use' ];
            if ($is_use) {
                $is_use = 0;
                $res = $config_model->enableCallBack($is_use);
                return $res;
            }
        }
    }
}