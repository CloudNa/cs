<?php
/**
 *shop商城系统
 */

namespace app\admin\controller;

use addon\platformcoupon\model\PlatformcouponType;
use app\model\member\MemberLevel as MemberLevelModel;

/**
 * 会员等级管理 控制器
 */
class Memberlevel extends BaseAdmin
{
	/**
	 * 会员等级列表
	 */
	public function levelList()
	{
		if (request()->isAjax()) {
			$page = input('page', 1);
			$page_size = input('page_size', PAGE_LIST_ROWS);
			$search_text = input('search_text', '');
			
			$condition = [];
			$condition[] = [ 'level_name', 'like', "%" . $search_text . "%" ];
			$order = 'growth asc';
			$field = '*';
			
			$member_level_model = new MemberLevelModel();
			$list = $member_level_model->getMemberLevelPageList($condition, $page, $page_size, $order, $field);
			return $list;
		} else {
			return $this->fetch('memberlevel/level_list');
		}
	}
	
	/**
	 * 会员等级添加
	 */
	public function addLevel()
	{
		if (request()->isAjax()) {
			$data = [
				'level_name' => input('level_name', ''),
				'growth' => input('growth', 0.00),
				'remark' => input('remark', ''),
                'consume_discount' => input('consume_discount', 100),
                'point_feedback'   => input('point_feedback', 0),
                'send_point'       => input('send_point', 0),
                'send_balance'     => input('send_balance', 0),
                'send_coupon'      => input('coupon', ''),
                'level_type'      => 0,
                'charge_rule' => '',
                'charge_type' => 0
			];


			$member_level_model = new MemberLevelModel();
			$this->addLog("会员等级添加:" . $data['level_name']);
			return $member_level_model->addMemberLevel($data);
		} else {
			return $this->fetch('memberlevel/add_level');
		}
	}
	
	/**
	 * 会员等级修改
	 */
	public function editLevel()
	{
		if (request()->isAjax()) {
			$data = [
				'level_name' => input('level_name', ''),
				'growth' => input('growth', 0.00),
				'remark' => input('remark', ''),
                'consume_discount' => input('consume_discount', 100),
                'point_feedback'   => input('point_feedback', 0),
                'send_point'       => input('send_point', 0),
                'send_balance'     => input('send_balance', 0),
                'send_coupon'      => input('coupon', ''),
                'level_type'      => 0,
                'charge_rule' => '',
                'charge_type' => 0


			];
			
			$level_id = input('level_id', 0);

			$member_level_model = new MemberLevelModel();
			$this->addLog("会员等级修改:" . $data['level_name']);
			return $member_level_model->editMemberLevel($data, [ [ 'level_id', '=', $level_id ] ]);
		} else {
			
			$level_id = input('get.level_id', 0);
			$member_level_model = new MemberLevelModel();
			$level_info = $member_level_model->getMemberLevelInfo([ [ 'level_id', '=', $level_id ] ]);

			//读取优惠券列表
            if (!isset($level_info['data']['send_coupon'])) $level_info['data']['send_coupon'] = 0;
            $coupon_list = [];
            if($level_info['data']['send_coupon'] != 0 && $level_info['data']['send_coupon'] != '') {
                $coupon = new PlatformcouponType();
                $coupon_list = $coupon->getPlatformcouponTypeList([ ['status','=',1],['platformcoupon_type_id','in',$level_info['data']['send_coupon']] ]);
                $coupon_list = $coupon_list['data'];
            }
            $level_info['data']['coupon_list'] = $coupon_list;
            $this->assign('level_info', $level_info);
			return $this->fetch('memberlevel/edit_level');
		}
	}
	
	/**
	 * 会员等级删除
	 */
	public function deleteLevel()
	{
		$level_ids = input('level_ids', '');
		$member_level_model = new MemberLevelModel();
		$this->addLog("会员等级删除id:" . $level_ids);
		return $member_level_model->deleteMemberLevel([ [ 'level_id', 'in', $level_ids ] ]);
	}
	
	/**
	 * 设置默认
	 */
	public function setDefault(){
		if (request()->isAjax()) {
			$level_id = input('level_id', '');
			$member_level_model = new MemberLevelModel();
			$res = $member_level_model->setDefaultLevel($level_id);
			return $res;
		}
	}
}