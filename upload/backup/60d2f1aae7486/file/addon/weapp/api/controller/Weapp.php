<?php
/**
 *shop商城系统
 */

namespace addon\weapp\api\controller;

use app\api\controller\BaseApi;
use addon\weapp\model\Weapp as WeappModel;

class Weapp extends BaseApi
{
	/**
	 * 获取openid
	 */
	public function authCodeToOpenid()
	{
		$weapp_model = new WeappModel();
		$res = $weapp_model->authCodeToOpenid($this->params);
		return $this->response($res);
	}
}