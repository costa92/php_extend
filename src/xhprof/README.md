# xhprof
Xhprof是facebook开源出来的一个php轻量级的性能分析工具，跟Xdebug类似，但性能开销更低 [详情](/about/)


# 使用方式 
在执行代码之前执行
`\COSTA\XHPROF\Execute::start();  `
执行代码逻辑
` $this->circulation();`

执行结束执行在下面代码 会返回值
`$ruid=\COSTA\XHPROF\Execute::end();`

Execute::end() 的参数默认是:xhprof_foo

拿到 $ruid 值  

`http://xhprof.costalong.com/index.php?run={$ruid}&source=xhprof_foo`


结果：
![屏幕快照 2018-12-05 下午5.37.19.png](http://file.longqiuhong.com/2018/12/05/Dw^Y-2zz.png)

![屏幕快照 2018-12-05 下午5.39.31.png](http://file.longqiuhong.com/2018/12/05/UrGDt-kW.png)

通过商品图片，我们可以到执行方法次数与方法调用的时间，这样就可以优化代码

http://xhprof.costalong.com 是我本地的站点，![可以参考](https://segmentfault.com/a/1190000003509917) 搭建自己的分析站点



或者 直接代码开始执行就执行   \COSTA\XHPROF\Execute::run(); 也可以打印出来 runId




