<?php
/**
 * shop多商户商城
 */
namespace addon\wechat\admin\controller;


/**
 * 微信菜单控制器
 */
class Share extends BaseWechat
{
	/**
	 * 微信自定义菜单配置
	 */
	public function share()
	{
		if (request()->isAjax()) {
			
			return success();
		} else {
			
			return $this->fetch('share/share', [], $this->replace);
		}
	}
	
}