<?php
/**
 *shop商城系统
 */


namespace app\event;

use app\model\express\Kdbird;

/**
 * 关闭物流查询
 * @author Administrator
 *
 */
class CloseKdbirdTrace
{
    public function handle($param = [])
    {
        $kdbird_model = new Kdbird();
        $result = $kdbird_model->modifyStatus(0);
        return $result;
    }
}
