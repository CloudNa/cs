<?php
/**
 *shop商城系统
 */

namespace addon\live\admin\controller;

use addon\live\model\Room as RoomModel;
use app\admin\controller\BaseAdmin;

/**
 * 直播间
 */
class Room extends BaseAdmin
{
    protected $replace = [];    //视图输出字符串内容替换    相当于配置文件中的'view_replace_str'

    public function __construct()
    {
        parent::__construct();
        $this->replace = [
            'LIVE_IMG' => __ROOT__ . '/addon/live/admin/view/public/img',
        ];
    }

    /**
     * 直播间列表
     * @return array|mixed
     */
    public function index()
    {
        $room = new RoomModel();
        if (request()->isAjax()) {
            $page = input('page', 1);
            $page_size = input('page_size', PAGE_LIST_ROWS);
            $status = input('status', '');
            $condition = [
            ];
            if (!empty($status)) {
                $condition[] = [ 'live_status', '=', $status ];
            }
            $data = $room->getRoomPageList($condition, '*', 'id desc', $page, $page_size);
            return $data;
        } else {
            $this->assign('status_list', $room->liveStatus);
            return $this->fetch("room/index", [], $this->replace);
        }
    }

    /**
     * 同步直播间
     * @return array
     */
    public function sync()
    {
        if (request()->isAjax()) {
            $room = new RoomModel();
            $start = input('start', 0);
            $res = $room->syncLiveRoom($start, 20, $this->site_id);
            return $res;
        }
    }

    /**
     * 详情
     */
    public function detail()
    {
        $id = input('id', 0);
        $room = new RoomModel();
        $condition = array (
            [ 'id', '=', $id ]
        );
        $info_result = $room->getRoomInfo($condition);
        $info = $info_result[ 'data' ] ?? [];
        $info[ 'live_status_name' ] = $room->liveStatus[ $info[ 'live_status' ] ] ?? '';
        $info[ 'audit_status_name' ] = $room->audit_status[ $info[ 'audit_status' ] ] ?? '';
        $this->assign('info', $info);


        return $this->fetch("room/detail", [], $this->replace);
    }

    /**
     * 通过直播申请
     * @return array|int
     */
    public function agree()
    {
        $id = input('id', 0);
        $room = new RoomModel();
        $result = $room->agree($id);
        return $result;
    }

    /**
     * 拒绝直播申请
     * @return array|int
     */
    public function refuse()
    {
        $id = input('id', 0);
        $reason = input('reason', '');
        $room = new RoomModel();
        $result = $room->refuse($id, $reason);
        return $result;
    }

}