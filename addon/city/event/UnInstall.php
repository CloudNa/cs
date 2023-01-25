<?php
/**
 * shop多商户商城
 */


namespace addon\city\event;

use app\model\system\Cron;

/**
 * 应用卸载
 */
class UnInstall
{
    /**
     * 执行卸载
     */
    public function handle()
    {
        $cron = new Cron();
        $cron->deleteCron([ [ 'event', '=', 'WebsiteSettlement' ] ]);
        return success();
    }
}