<?php
/**
 *shop商城系统
 */
namespace app\event;

use app\model\goods\Goods;

/**
 * 定时上架商品
 * @author Administrator
 *
 */
class CronGoodsTimerOn
{
    public function handle($param)
    {

        $goods_model = new Goods();
        $condition = [
            [ 'goods_id', '=', $param['relate_id'] ]
        ];
        $res = $goods_model->goodsOn($condition);
        return $res;
    }
}
