<?php
/**
 *shop商城系统
 */


namespace addon\pointexchange\event;

/**
 * 活动展示
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
                    'name' => 'pointexchange',
                    //展示分类（根据平台端设置，admin（平台营销），shop：店铺营销，member:会员营销, tool:应用工具）
                    'show_type' => 'tool',
                    //展示主题
                    'title' => '积分商城',
                    //展示介绍
                    'description' => '积分兑换商品',
                    //展示图标
                    'icon' => 'addon/pointexchange/icon.png',
                    //跳转链接
                    'url' => 'pointexchange://admin/exchange/lists',
                ],
                
            ],
            'shop' => [
            ]

        ];
	    return $data;
	}
}