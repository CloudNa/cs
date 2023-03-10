<?php
/**
 *shop商城系统
 */


namespace app\event;

use think\facade\Cache;

/**
 * 初始化计划任务启动
 * @author Administrator
 *
 */
class InitCron
{
    public function handle()
    {
        if (defined('BIND_MODULE') && BIND_MODULE === 'install') {
            return;
        }
        $last_time = Cache::get("cron_last_load_time");
        if (empty($last_time)) {
            $last_time = 0;
        }
        $module = request()->module();
        if ($module != 'cron') {
            if (!defined('CRON_EXECUTE') && time() - $last_time > 100) {
                defined('CRON_EXECUTE') or define('CRON_EXECUTE', 1);
                $url = url('cron/task/phpCron');
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_exec($ch);
            }
        }

    }

}
