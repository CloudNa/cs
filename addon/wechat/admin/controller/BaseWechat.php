<?php
/**
 * shop多商户商城
 */
namespace addon\wechat\admin\controller;

use app\admin\controller\BaseAdmin;

/**
 * 微信控制器基类
 */
class BaseWechat extends BaseAdmin
{
	protected $replace = [];    //视图输出字符串内容替换    相当于配置文件中的'view_replace_str'
	
	public function __construct()
	{
		parent::__construct();
		$this->replace = [
			'WECHAT_CSS' => __ROOT__ . '/addon/wechat/admin/view/public/css',
			'WECHAT_JS' => __ROOT__ . '/addon/wechat/admin/view/public/js',
			'WECHAT_IMG' => __ROOT__ . '/addon/wechat/admin/view/public/img',
		];
	}
	
}