<?php
/**
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2018/12/5 2:45 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace COSTA\XHPROF;
class Execute
{

    public static function start()
    {
        // check xhprof extends ;
        self::checkoutExtends();
        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
    }

    /**
     * 执行类型
     * @param string $type
     * @return null|string
     */
    public static function end($type = 'xhprof_foo')
    {
        $xhprofData = xhprof_disable();
        self::loadLib();
        $xhprofRuns = new \XHProfRuns_Default();

        return $xhprofRuns->save_run($xhprofData , $type);
    }

    /**
     *  import xhprof lib files
     */
    public static function loadLib()
    {
        require 'xhprof_lib/utils/xhprof_lib.php';
        require 'xhprof_lib/utils/xhprof_runs.php';
    }

    /**
     *  检验是否安装插件
     */
    protected static function checkoutExtends()
    {
        if ( extension_loaded('xhprof') ) {
            return true;
        }
        throw new \Exception("uninstalled xhprof extends");
    }

    /**
     *  直接执行
     */
    public static function run()
    {
        self::start();
        self::loadLib();

        //注册一个函数，当程序执行结束的时候去执行它。
        register_shutdown_function(function () {
            //stop profiler
            $xhprof_data = xhprof_disable();
            //冲刷(flush)所有响应的数据给客户端
            if ( function_exists('fastcgi_finish_request') ) {
                fastcgi_finish_request();
            }
            $xhprof_runs = new  \XHProfRuns_Default();

            //save the run under a namespace "xhprof_foo"
            echo $xhprof_runs->save_run($xhprof_data , "xhprof_foo");
        });
    }
}
