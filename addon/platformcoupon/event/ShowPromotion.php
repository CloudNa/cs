<?php
/**
 *shop商城系统
 */


namespace addon\platformcoupon\event;

/**
 * 店铺活动
 */
class ShowPromotion
{

	/**
	 * 活动展示
	 *
	 * @return multitype:number unknown
	 */
	public function handle()
	{
	    $data = [
	        'admin' => [
	            [
	                //插件名称
	                'name' => 'platformcoupon',
	                //展示分类（根据平台端设置，admin（平台营销），shop：店铺营销，member:会员营销, tool:应用工具）
	                'show_type' => 'admin',
	                //展示主题
	                'title' => '平台优惠券',
	                //展示介绍
	                'description' => '平台优惠券功能',
	                //展示图标
	                'icon' => 'addon/platformcoupon/icon.png',
	                //跳转链接
	                'url' => 'platformcoupon://admin/platformcoupon/lists',
	            ]
	        ]
	
	    ];
	    return $data;
	}
}