<?php
/**
 * XhprofTest.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2018/12/5 2:50 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

use PHPUnit\Framework\TestCase;

class XhprofTest extends TestCase
{
    public function testRun()
    {
        \COSTA\XHPROF\Execute::start();
        $this->circulation();
        echo \COSTA\XHPROF\Execute::end();
    }

    public function testRunV2()
    {
        \COSTA\XHPROF\Execute::run();
        $this->circulation();

    }

    public function circulation($counts = 20)
    {
        $rs = 0;
        for ( $i = 1 ; $counts >= $i ; $i++ ) {
            $rs = $rs + $i;
        }
        return $rs;
    }
}