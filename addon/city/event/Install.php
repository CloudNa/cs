<?php
/**
 *shop商城系统
 */


namespace addon\city\event;

use app\model\system\Cron;
use app\model\system\Menu;
use Carbon\Carbon;

/**
 * 应用安装
 */
class Install
{
	/**
	 * 执行安装
	 */
	public function handle()
	{
	    
        $menu = new Menu();
        $menu->refreshMenu("city", "city");
        //创建自动执行事件
        $cron = new Cron();
        $execute_time = Carbon::now()->addMonth()->firstOfMonth()->timestamp + 30*60;
        $cron->deleteCron([ [ 'event', '=', 'WebsiteSettlement' ] ]);
        $cron->addCron('2','1','分站周期结算','WebsiteSettlement',$execute_time,'0',3);
        return success();
	}
}