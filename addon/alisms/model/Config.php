<?php
/**
 *shop商城系统
 */

namespace addon\alisms\model;

use app\model\system\Config as ConfigModel;
use app\model\BaseModel;

/**
 * 支付宝支付配置
 */
class Config extends BaseModel
{
	/**
	 * 设置短信配置
	 * array $data
	 */
    public function setSmsConfig($data, $is_use)
    {
        $config = new ConfigModel();
        $res = $config->setConfig($data, '阿里云短信配置', $is_use, [ [ 'site_id', '=', 0 ], [ 'app_module', '=', 'admin' ], [ 'config_key', '=', 'ALI_SMS_CONFIG' ] ]);
        event('EnableCallBack', [ 'sms_type' => 'alisms', 'is_use' => $is_use ]);
        return $res;
    }
	
	/**
	 * 获取短信配置
	 */
	public function getSmsConfig()
	{
		$config = new ConfigModel();
		$res = $config->getConfig([ [ 'site_id', '=', 0 ], [ 'app_module', '=', 'admin' ], [ 'config_key', '=', 'ALI_SMS_CONFIG' ] ]);
		return $res;
	}

    /**
     * 设置开关
     */
    public function modifyConfigIsUse($is_use, $app_module = 'admin')
    {
        $config = new ConfigModel();
        $res = $config->modifyConfigIsUse($is_use, [ ['site_id','=',0],[ 'app_module', '=', $app_module ], [ 'config_key', '=', 'ALI_SMS_CONFIG' ] ]);
        event('EnableCallBack', [ 'sms_type' => 'alisms', 'is_use' => $is_use ]);
        return $res;
    }

    /**
     * 事件修改开关状态
     */
    public function enableCallBack($is_use, $app_module = 'admin')
    {
        $config = new ConfigModel();
        $res = $config->modifyConfigIsUse($is_use, [ ['site_id','=',0], [ 'app_module', '=', $app_module ], [ 'config_key', '=', 'ALI_SMS_CONFIG' ] ]);
        return $res;
    }
}