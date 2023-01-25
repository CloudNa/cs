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
		$member_level_list = $member_level_model->getMemberLevelList([], 'level_id,level_name,growth,remark', 'growth asc');
		return $this->response($member_level_list);
	}
	
}