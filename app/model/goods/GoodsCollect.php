<?php
/**
 *shop商城系统
 */

namespace app\model\goods;


use app\model\BaseModel;
use app\model\system\Stat;

/**
 * 商品收藏
 */
class GoodsCollect extends BaseModel
{
	/**
	 * 添加收藏
	 * @param array $data
	 */
	public function addCollect($data)
	{
		$res = model('goods_collect')->getInfo([ [ 'member_id', '=', $data['member_id'] ], [ 'goods_id', '=', $data['goods_id'] ] ], 'site_id, collect_id');
		if (empty($res)) {
			$data['create_time'] = time();
			$collect_id = model('goods_collect')->add($data);
			if ($collect_id) {
				model("goods_sku")->setInc([ [ 'goods_id', '=', $data['goods_id'] ] ], 'collect_num', 1);
			}
			//添加统计
			$stat = new Stat();

			$stat->addShopStat([ 'collect_goods' => 1, 'site_id' => $data['site_id'] ]);
			return $this->success($collect_id);
		} else {
			return $this->error();
		}
		
	}
	
	/**
	 * 取消收藏
	 * @param int $member_id
	 * @param int $goods_id
	 */
	public function deleteCollect($member_id, $goods_id)
	{
        $collect_info = model('goods_collect')->getInfo([ [ 'member_id', '=', $member_id ], [ 'goods_id', '=', $goods_id ] ], 'site_id, collect_id');
		if(!empty($collect_info)){
            $res = model('goods_collect')->delete([ [ 'member_id', '=', $member_id ], [ 'goods_id', '=', $goods_id ] ]);
            if ($res) {
                model("goods_sku")->setDec([ [ 'goods_id', '=', $goods_id ] ], 'collect_num', 1);
                //添加统计
                $stat = new Stat();
                $stat->addShopStat([ 'collect_goods' => -1, 'site_id' => $collect_info['site_id'] ]);
            }
            return $this->success($res);
        }else{
		    return $this->error();
        }

	}

    /**
     * 检测商品是否收藏
     * @param $goods_id
     * @param $member_id
     * @return array
     */
	public function getIsCollect($goods_id, $member_id)
	{
		$res = model('goods_collect')->getInfo([ [ 'member_id', '=', $member_id ], [ 'goods_id', '=', $goods_id ] ], 'collect_id');
		if (!empty($res)) {
			return $this->success(1);
		} else {
			return $this->success(0);
		}
	}
	
	/**
	 * 获取收藏列表
	 * @param array $condition
	 * @param string $field
	 * @param string $order
	 * @param string $limit
	 */
	public function getCollectList($condition = [], $field = 'collect_id, member_id, goods_id, sku_id, category_id, sku_name, sku_price, sku_image, create_time', $order = '', $limit = null)
	{
		$list = model('goods_collect')->getList($condition, $field, $order, '', '', '', $limit);
		return $this->success($list);
	}
	
	/**
	 * 获取收藏分页列表
	 * @param array $condition
	 * @param number $page
	 * @param string $page_size
	 * @param string $order
	 * @param string $field
	 */
    public function getCollectPageList($condition = [], $page = 1, $page_size = PAGE_LIST_ROWS, $order = 'gc.create_time desc', $field = 'gc.collect_id, gc.member_id, gc.goods_id, gc.sku_id,gc.sku_name, gc.sku_price, gc.sku_image,g.goods_name,g.is_free_shipping,sku.promotion_type,sku.discount_price,g.sale_num,g.price,g.market_price,g.is_virtual')
    {
        $alias = 'gc';
        $join  = [
            ['goods g', 'gc.goods_id = g.goods_id', 'inner'],
            ['goods_sku sku', 'gc.sku_id = sku.sku_id', 'inner']
        ];
        $list  = model('goods_collect')->pageList($condition, $field, $order, $page, $page_size, $alias, $join);
        return $this->success($list);
    }
}