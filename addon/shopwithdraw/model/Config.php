<?php
/**
 *shop商城系统
 */

namespace addon\shopwithdraw\model;

use app\model\system\Config as ConfigModel;
use app\model\BaseModel;

/**
 * 店铺提现
 */
class Config extends BaseModel
{
	/**
	 * 店铺提现设置
	 * array $data
	 */
	public function setConfig($data, $is_use)
	{
		$config = new ConfigModel();
		$res = $config->setConfig($data, '店铺提现设置', $is_use, [ [ 'site_id', '=', 0 ], [ 'app_module', '=', 'admin' ], [ 'config_key', '=', 'SHOP_WITHDRAW_CONFIG' ] ]);
		return $res;
	}

	/**
	 * 店铺提现设置
	 */
	public function getConfig()
	{
		$config = new ConfigModel();
		$res = $config->getConfig([ [ 'site_id', '=', 0 ], [ 'app_module', '=', 'admin' ], [ 'config_key', '=', 'SHOP_WITHDRAW_CONFIG' ] ]);
		return $res;
	}
}