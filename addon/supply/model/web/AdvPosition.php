<?php
/**
 *shop商城系统
 */

namespace addon\supply\model\web;


use think\facade\Cache;
use app\model\BaseModel;

/**
 * 广告位管理
 * @author Administrator
 *
 */
class AdvPosition extends BaseModel
{
    /**
     * 添加广告位
     * @param array $data
     */
    public function addAdvPosition($data)
    {
        //判断关键词是否已存在
        $count = model('supply_adv_position')->getCount([['keyword','=',$data['keyword']]]);
        if($count > 0){
            return $this->error('','该关键词已存在');
        }

        $ap_id = model('supply_adv_position')->add($data);
        Cache::tag("supply_adv_position")->clear();
        return $this->success($ap_id);
    }

    /**
     * 修改广告位
     * @param array $data
     */
    public function editAdvPosition($data, $condition)
    {
        //判断关键词是否已存在
        $count = model('supply_adv_position')->getCount([ ['keyword','=',$data['keyword']], ['ap_id','<>',$data['ap_id']] ]);
        if($count > 0){
            return $this->error('','该关键词已存在');
        }

        $res = model('supply_adv_position')->update($data, $condition);
        Cache::tag("supply_adv_position")->clear();
        return $this->success($res);
    }

    /**
     * 删除广告位
     * @param unknown $condition
     */
    public function deleteAdvPosition($condition)
    {

        $adv_position_list = model('supply_adv_position')->getList($condition,'ap_id,is_system');
        model('supply_adv_position')->startTrans();
        try{

            if(!empty($adv_position_list)){
                foreach($adv_position_list as $v){
                    if($v['is_system'] == 0){
                        //删除广告位
                        model('supply_adv_position')->delete([['ap_id','=',$v['ap_id']]]);
                        //删除广告
                        $adv_model = new Adv();
                        $adv_model->deleteAdv([['ap_id','=',$v['ap_id']]]);
                    }
                }
            }

            Cache::tag("supply_adv_position")->clear();
            model('supply_adv_position')->commit();
            return $this->success();
        }catch(\Exception $e){

            model('adv_position')->rollback();
            return $this->error('',$e->getMessage());
        }
    }

    /**
     * 获取广告位基础信息
     * @param $condition
     * @param string $file
     * @return array
     */
    public function getAdvPositionInfo($condition, $file = 'ap_id, keyword , ap_name, ap_intro, ap_height, ap_width, default_content, ap_background_color,is_system')
    {
        $data = json_encode([$condition]);
        $cache = Cache::get("supply_adv_position_getAdvPositionInfo_" . $data);
        if (!empty($cache)) {
            return $this->success($cache);
        }
        $res = model('supply_adv_position')->getInfo($condition, $file);
        Cache::tag("supply_adv_position")->set("supply_adv_position_getAdvPositionInfo_" . $data, $res);
        return $this->success($res);
    }

    /**
     * 获取广告位列表
     * @param array $condition
     * @param string $field
     * @param string $order
     * @param string $limit
     */
    public function getAdvPositionList($condition = [], $field = 'ap_id, keyword , ap_name, ap_intro, ap_height, ap_width, default_content, ap_background_color,is_system', $order = '', $limit = null)
    {

        $data = json_encode([$condition, $field, $order, $limit]);
        $cache = Cache::get("supply_adv_position_getAdvPositionList_" . $data);
        if (!empty($cache)) {
            return $this->success($cache);
        }
        $list = model('supply_adv_position')->getList($condition, $field, $order, '', '', '', $limit);
        Cache::tag("supply_adv_position")->set("supply_adv_position_getAdvPositionList_" . $data, $list);

        return $this->success($list);
    }

    /**
     * 获取广告位分页列表
     * @param array $condition
     * @param number $page
     * @param string $page_size
     * @param string $order
     * @param string $field
     */
    public function getAdvPositionPageList($condition = [], $page = 1, $page_size = PAGE_LIST_ROWS, $order = 'ap_id desc', $field = 'ap_id, keyword , ap_name, ap_intro, ap_height, ap_width, default_content, ap_background_color, is_system')
    {
        $data = json_encode([$condition, $field, $order, $page, $page_size]);
        $cache = Cache::get("supply_adv_position_getAdvPositionPageList_" . $data);
        if (!empty($cache)) {
            return $this->success($cache);
        }
        $list = model('supply_adv_position')->pageList($condition, $field, $order, $page, $page_size);
        Cache::tag("supply_adv_position")->set("supply_adv_position_getAdvPositionPageList_" . $data, $list);
        return $this->success($list);
    }

}
