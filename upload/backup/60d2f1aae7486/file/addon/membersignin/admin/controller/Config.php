<?php
/**
 *shop商城系统
 */

namespace addon\membersignin\admin\controller;

use addon\membersignin\model\Signin;
use app\admin\controller\BaseAdmin;

/**
 * 会员签到
 */
class Config extends BaseAdmin
{
	
	public function index()
	{
		$config_model = new Signin();
        if (request()->isAjax()) {
            $data   = input("json", "{}");
            $cycle   = input("cycle", 30);
            $is_use = input("is_use", 0);//是否启用
            $data   = json_decode($data,true);
            $res    = $config_model->setConfig(['cycle' => $cycle, 'reward' => $data], $is_use);
            $this->addLog("设置会员签到奖励");
            return $res;
        } else {
            $config_result = $config_model->getConfig();
            $this->assign('config', $config_result['data']);
            return $this->fetch('config/index');
        }
	}


	
}