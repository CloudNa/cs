<?php
/**
 * shop多商户商城
 */
namespace addon\city\event;


/**
 * 分站结算
 */
class LinkDict
{
	// 行为扩展的执行入口必须是run
	public function handle($data)
	{
        $link_dict = [
            'city' => [
                'ALL_GOODS' => [
                    'wap_url' => '/pages/goods/detail/detail?sku_id=',
                    'promotion' => 'all',
                    'select_id' => 'sku_id'
                ],
                'PINTUAN_GOODS' => [
                    'wap_url' => '/pages/goods/detail/detail?pintuan_id=',
                    'goodsColsParameter' => [
                        'price' => 'pintuan_price'
                    ],
                    'promotion' => 'pintuan',
                    'select_id' => 'pintuan_id'
                ],
                'GROUPBUY_GOODS' => [
                    'wap_url' => '/pages/goods/detail/detail?groupbuy_id=',
                    'goodsColsParameter' => [
                        'price' => 'groupbuy_price'
                    ],
                    'promotion' => 'groupbuy',
                    'select_id' => 'groupbuy_id'
                ],
                'DISTRIBUTION_GOODS' => [
                    'wap_url' => '/pages/goods/detail/detail?sku_id=',
                    'promotion' => 'distribution',
                    'select_id' => 'sku_id'
                ],
                'BARGAIN_GOODS' => [
                    'wap_url' => '/pages/goods/detail/detail?bargain_id=',
                    'promotion' => 'bargain',
                    'select_id' => 'bargain_id'
                ]
            ],
        ];

        return $link_dict;
	}


}