<?php
/**
 * shop多商户商城
 */

namespace app\api\controller;

use app\model\member\MemberLevel as MemberLevelModel;

class Memberlevel extends BaseApi
{
	/**
	 * 列表信息
	 */
	public function lists()
	{
		$member_level_model = new MemberLevelModel();

        $field = 'level_id,level_name,growth,remark,consume_discount,is_free_shipping,point_feedback,send_point,send_balance,send_coupon,charge_rule,charge_type,bg_color';
        $member_level_list  = $member_level_model->getMemberLevelList([], $field, 'growth asc,level_id desc');
        return $this->response($member_level_list);

        
//		$member_level_list = $member_level_model->getMemberLevelList([], 'level_id,level_name,growth,remark', 'growth asc');
//		return $this->response($member_level_list);
	}
	
}