<?php
/**
 *shop商城系统
 */


namespace addon\presale\event;

use addon\presale\model\Presale;
/**
 * 是否参与预售
 */
class IsJoinPresale
{

	public function handle($params)
	{
	    $presale = new Presale();
	    $res = $presale->isJoinPresaleBySkuId($params['sku_id']);
        return $res;
	}
}