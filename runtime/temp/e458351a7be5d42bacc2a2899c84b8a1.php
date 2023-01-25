<?php /*a:2:{s:73:"/www/wwwroot/niushop1.bucuoya.cn/addon/city/admin/view/website/lists.html";i:1619857884;s:24:"app/admin/view/base.html";i:1619851154;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1" />
	<title><?php echo htmlentities((isset($menu_info['title']) && ($menu_info['title'] !== '')?$menu_info['title']:"")); ?> - <?php echo htmlentities((isset($website['title']) && ($website['title'] !== '')?$website['title']:"shop多商户商城")); ?></title>
	<meta name="keywords" content="<?php echo htmlentities((isset($website['keywords']) && ($website['keywords'] !== '')?$website['keywords']:'shop多商户商城')); ?>">
	<meta name="description" content="<?php echo htmlentities((isset($website['desc']) && ($website['desc'] !== '')?$website['desc']:'描述')); ?>}">
	<link rel="icon" type="image/x-icon" href="http://niushop1.bucuoya.cn/public/static/img/bitbug_favicon.ico" />
	<link rel="stylesheet" type="text/css" href="http://niushop1.bucuoya.cn/public/static/css/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="http://niushop1.bucuoya.cn/public/static/ext/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="http://niushop1.bucuoya.cn/public/static/loading/msgbox.css"/>
	<link rel="stylesheet" type="text/css" href="http://niushop1.bucuoya.cn/app/admin/view/public/css/common.css" />
	<script src="http://niushop1.bucuoya.cn/public/static/js/jquery-3.1.1.js"></script>
	<script src="http://niushop1.bucuoya.cn/public/static/js/jquery.cookie.js"></script>
	<script src="http://niushop1.bucuoya.cn/public/static/ext/layui/layui.js"></script>
	<script>
		layui.use(['layer', 'upload', 'element'], function() {});
		var nsColor = '#4685FD';
		window.ns_url = {
			baseUrl: "http://niushop1.bucuoya.cn/index.php/",
			route: ['<?php echo request()->module(); ?>', '<?php echo request()->controller(); ?>', '<?php echo request()->action(); ?>'],
			IMGPATH:"http://niushop1.bucuoya.cn/app/admin/view/public/img/"
		};

	</script>
	<script src="http://niushop1.bucuoya.cn/public/static/js/common.js"></script>
	<script src="http://niushop1.bucuoya.cn/app/admin/view/public/js/common.js"></script>
	<style>
		.ns-calendar{background: url("http://niushop1.bucuoya.cn/public/static/img/ns_calendar.png") no-repeat center / 16px 16px;}
		@media only screen and (max-width: 1130px) {
			.layui-nav .layui-nav-item a {
				margin-left: 25px;
			}
		}
		@media only screen and (max-width: 1030px) {
			.layui-nav .layui-nav-item a {
				margin-left: 10px;
			}
		}
	</style>
	
<style>
    .layui-card-body{
        display: flex;
        justify-content: space-around;
    }
    .layui-card-body .money{
        font-size: 20px;
        color: #000;
        font-weight: bold;
        margin-top: 10px;
        text-align: center;
        max-width: 250px;
    }
    .layui-card-body .subhead{
        font-size: 12px;
        margin-left: 3px;
        cursor: pointer;
    }
    .layui-table-box {
        overflow: inherit;
    }
    .layui-table-header {
        overflow: inherit;
    }
    .layui-table-header .layui-table-cell{overflow: inherit;}
    .ns-prompt .iconfont{font-size: 16px;color: rgba(0,0,0,0.7);cursor: pointer;font-weight: 500;margin-left: 3px;}
    .ns-prompt-con{font-weight: 500;text-align: left}
    .img_block_sty{width:40px;height:40px;}
    .img_sty{width:100%;height:100%;}
</style>


</head>
<body>

<div class="ns-logo">
	<div class="logo-box">
		<img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/logo.png">
	</div>
	<span>B2B2C多商户平台端</span>
</div>

<div class="layui-layout layui-layout-admin">
	
	<div class="layui-header">
		<!-- 一级菜单 -->
		<ul class="layui-nav layui-layout-left">
			<?php $second_menu = []; foreach($menu as $menu_k => $menu_v): ?>
			<li class="layui-nav-item <?php if($menu_v['selected']): ?> layui-this<?php endif; ?>">
				<a href="<?php echo htmlentities($menu_v['url']); ?>"><?php echo htmlentities($menu_v['title']); ?></a>
			</li>
			<?php if($menu_v['selected']): 
				$second_menu = $menu_v['child_list'];
				 ?>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<ul class="layui-nav layui-layout-right">
			<li class="layui-nav-item">
				<a href="javascript:;">
					<div class="ns-img-box">
						<img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/default_headimg.png" alt="">
					</div>
					<?php echo htmlentities($user_info['username']); ?>
				</a>
				<dl class="layui-nav-child">
					<dd class="ns-reset-pass" onclick="resetPassword();">
						<a href="javascript:;">修改密码</a>
					</dd>
					<dd>
						<a onclick="clearCache()" href="javascript:;">清除缓存</a>
					</dd>
					<dd>
						<a href="<?php echo addon_url('admin/login/logout'); ?>" class="login-out">退出登录</a>
					</dd>
				</dl>
			</li>
		</ul>
	</div>
	

	<?php if(!(empty($second_menu) || (($second_menu instanceof \think\Collection || $second_menu instanceof \think\Paginator ) && $second_menu->isEmpty()))): ?>
	<div class="layui-side">
		<div class="layui-side-scroll">
			<span class="ns-side-title"><?php echo htmlentities($crumbs[0]['title']); ?></span>
			<!-- 二三级菜单-->
			<ul class="layui-nav layui-nav-tree"  lay-filter="test">
				<?php foreach($second_menu as $menu_second_k => $menu_second_v): ?>
				<li class="layui-nav-item <?php if($menu_second_v['selected']): ?> layui-nav-itemed <?php endif; if(!$menu_second_v['child_list'] && $menu_second_v['selected']): ?> layui-this<?php endif; ?>">
					<a class="layui-menu-tips" href="<?php if(!$menu_second_v['child_list']): ?> <?php echo htmlentities($menu_second_v['url']); else: ?>javascript:;<?php endif; ?>"><?php echo htmlentities($menu_second_v['title']); ?></a>
					<?php if(!(empty($menu_second_v['child_list']) || (($menu_second_v['child_list'] instanceof \think\Collection || $menu_second_v['child_list'] instanceof \think\Paginator ) && $menu_second_v['child_list']->isEmpty()))): ?>
					<dl class="layui-nav-child">
						<?php foreach($menu_second_v["child_list"] as $menu_third_k => $menu_third_v): ?>
						<dd class="<?php if($menu_third_v['selected']): ?> layui-this<?php endif; ?>">
							<a href="<?php echo htmlentities($menu_third_v['url']); ?>"><?php echo htmlentities($menu_third_v['title']); ?></a>
						</dd>
						<?php endforeach; ?>
					</dl>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>

	<div class="layui-body<?php if(empty($second_menu) || (($second_menu instanceof \think\Collection || $second_menu instanceof \think\Paginator ) && $second_menu->isEmpty())): ?> child_no_exit<?php endif; ?>">
		<!-- 面包屑 -->
		
		<?php if(count($second_menu) > 0): ?>
		<div class="ns-crumbs<?php if(empty($second_menu) || (($second_menu instanceof \think\Collection || $second_menu instanceof \think\Paginator ) && $second_menu->isEmpty())): ?> child_no_exit<?php endif; ?>">
		<span class="layui-breadcrumb" lay-separator="-">
			<?php foreach($crumbs as $crumbs_k => $crumbs_v): if(count($crumbs) == ($crumbs_k + 1)): ?>
			<a href="<?php echo htmlentities($crumbs_v['url']); ?>"><cite><?php echo htmlentities($crumbs_v['title']); ?></cite></a>
			<?php else: ?>
			<a href="<?php echo htmlentities($crumbs_v['url']); ?>"><?php echo htmlentities($crumbs_v['title']); ?></a>
			<?php endif; ?>
			<?php endforeach; ?>
		</span>
		</div>
		<?php endif; ?>
		
		<div class="ns-body-content <?php if(count($second_menu) < 1): ?> crumbs_no_exit<?php endif; ?>">
			<div class="ns-body">
				<!-- 四级导航 -->
				<?php if(isset($forth_menu) && !empty($forth_menu)): ?>
				<div class="fourstage-nav layui-tab layui-tab-brief" lay-filter="edit_user_tab">
					<ul class="layui-tab-title">
						<?php if(is_array($forth_menu) || $forth_menu instanceof \think\Collection || $forth_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $forth_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
						<li class="<?php echo $menu['selected']==1 ? 'layui-this'  :  ''; ?>" lay-id="basic_info"><a href="<?php echo htmlentities($menu['parse_url']); ?>"><?php echo htmlentities($menu['title']); ?></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<?php endif; ?>
				
<!-- 筛选面板 -->
<div class="layui-collapse ns-tips">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">操作提示</h2>
        <ul class="layui-colla-content layui-show">
            <li>城市分站列表，可在此展示所有城市分站</li>
            <li>可添加城市分站以及对城市分站进行编辑和删除操作</li>
            <li>城市分站管理中心：<a href="<?php echo url('city/city/index/index'); ?>" target="_blank" class="ns-text-color"><?php echo url('city/city/index/index'); ?></a></li>
        </ul>
    </div>
</div>
<div class="ns-single-filter-box">
    <button class="layui-btn ns-bg-color" onclick="clickAdd()">添加城市分站</button>
</div>
<div class="ns-screen layui-collapse" lay-filter="selection_panel">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">筛选</h2>
        <form class="layui-colla-content layui-form layui-show">
            <div class="layui-form-item">

                <div class="layui-inline">
                    <label class="layui-form-label">分站城市：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="site_area_name" placeholder="请输入分站城市名称" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">分站联系方式：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="web_phone" placeholder="请输入分站联系方式" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">分站状态：</label>
                    <div class="layui-input-inline">
                        <select name="status">
                            <option value="">全部</option>
                            <option value="1">正常</option>
                            <option value="-1">关闭</option>
                        </select>
                    </div>
                </div>
			</div>
			
			<div class="layui-form-item">
			    <div class="layui-inline">
			        <label class="layui-form-label">添加时间：</label>
			        <div class="layui-input-inline">
			            <input type="text" class="layui-input" name="start_time" readonly id="start_time" autocomplete="off" placeholder="开始时间" >
			            <i class="ns-calendar"></i>
			        </div>
			        <div class="layui-form-mid">-</div>
			        <div class="layui-input-inline">
			            <input type="text" class="layui-input" name="end_time" readonly id="end_time" autocomplete="off" placeholder="结束时间" >
			            <i class="ns-calendar"></i>
			        </div>
			    </div>
			</div>

            <div class="ns-form-row">
                <button class="layui-btn ns-bg-color" lay-submit lay-filter="search">筛选</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </form>
    </div>
</div>



<table id="account_list" lay-filter="account_list"></table>

			</div>

			<!-- 版权信息 -->
			<div class="ns-footer">
				<a class="ns-footer-img" href="#"><img src="<?php if(!empty($copyright['logo'])): ?> <?php echo img($copyright['logo']); else: ?>http://niushop1.bucuoya.cn/public/static/img/copyright_logo.png<?php endif; ?>" /></a>
			</div>
		</div>
	</div>
</div>

<!-- 重置密码弹框html -->
<div class="layui-form" id="reset_pass" style="display: none;">
    <div class="layui-form-item">
        <label class="layui-form-label"><span class="required">*</span>原密码</label>
        <div class="layui-input-block">
            <input type="password" id="old_pass" name="old_pass" required class="layui-input ns-len-mid" maxlength="18" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly',true);">
            <span class="required"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><span class="required">*</span>新密码</label>
        <div class="layui-input-block">
            <input type="password" id="new_pass" name="new_pass" required class="layui-input ns-len-mid" maxlength="18" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly',true);">
            <span class="required"></span>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"><span class="required">*</span>确认新密码</label>
        <div class="layui-input-block">
            <input type="password" id="repeat_pass" name="repeat_pass" required class="layui-input ns-len-mid" maxlength="18" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly',true);">
            <span class="required"></span>
        </div>
    </div>

    <div class="ns-form-row">
        <button class="layui-btn ns-bg-color" onclick="repass()">确定</button>
        <button class="layui-btn layui-btn-primary" onclick="closePass()">返回</button>
    </div>
</div>
<script type="text/javascript">
	layui.use('element',function () {
		var element = layui.element;
		element.render('breadcrumb');
	});
	function clearCache () {
		$.ajax({
			type: 'post',
			url: ns.url("admin/Login/clearCache"),
			dataType: 'JSON',
			success: function(res) {
				layer.msg(res.message);
				location.reload();
			}
		})
	}

    /**
     * 重置密码
     */
	var index;
    function resetPassword() {
        index = layer.open({
            type:1,
            content:$('#reset_pass'),
            offset: 'auto',
            area: ['650px']
        });

		setTimeout(function() {
			$(".ns-reset-pass").removeClass('layui-this');
		}, 1000);
    }

	// $(".ns-reset-pass").on('click', function() {
	// 	$(this).removeClass('layui-this');
	// })

    var repeat_flag = false;
    function repass(){
        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        var repeat_pass = $("#repeat_pass").val();

        if (old_pass == '') {
            $("#old_pass").focus();
            layer.msg("原密码不能为空");
            return;
        }

        if (new_pass == '') {
            $("#new_pass").focus();
            layer.msg("密码不能为空");
            return;
        } else if ($("#new_pass").val().length < 6) {
            $("#new_pass").focus();
            layer.msg("密码不能少于6位数");
            return;
        }
        if (repeat_pass == '') {
            $("#repeat_pass").focus();
            layer.msg("密码不能为空");
            return;
        } else if ($("#repeat_pass").val().length < 6) {
            $("#repeat_pass").focus();
            layer.msg("密码不能少于6位数");
            return;
        }
        if (new_pass != repeat_pass) {
            $("#repeat_pass").focus();
            layer.msg("两次密码输入不一样，请重新输入");
            return;
        }

        if(repeat_flag)return;
        repeat_flag = true;

        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: ns.url("admin/login/modifypassword"),
            data: {"old_pass": old_pass,"new_pass": new_pass},
            success: function(res) {
                layer.msg(res.message);
                repeat_flag = false;

                if (res.code == 0) {
                    layer.close(index);
                    location.reload();
                }
            }
        });
    }

    function closePass() {
        layer.close(index);
	}

	/**
	 * 打开相册
	 */
	function openAlbum(callback, imgNum) {
		layui.use(['layer'], function () {
			//iframe层-父子操作
			layer.open({
				type: 2,
				title: '图片管理',
				area: ['825px', '675px'],
				fixed: false, //不固定
				btn: ['保存', '返回'],
				content: ns.url("admin/album/album?imgNum=" + imgNum),
				yes: function (index, layero) {
					var iframeWin = window[layero.find('iframe')[0]['name']];//得到iframe页的窗口对象，执行iframe页的方法：

					iframeWin.getCheckItem(function (obj) {
						if (typeof callback == "string") {
							try {
								eval(callback + '(obj)');
								layer.close(index);
							} catch (e) {
								console.error('回调函数' + callback + '未定义');
							}
						} else if (typeof callback == "function") {
							callback(obj);
							layer.close(index);
						}

					});
				}
			});
		});
	}

	layui.use('element', function() {
		var element = layui.element;
		element.init();
	});
</script>


<script type="text/html" id="action">
    <div class="ns-table-btn">
        <a class="layui-btn" lay-event="edit">编辑</a>
        <a class="layui-btn" lay-event="detail">详情</a>
        <a class="layui-btn" lay-event="apply_pay">转账</a>
        {{#  if(d.status == 1){  }}
        <a class="layui-btn" lay-event="frozen">关闭</a>
        {{#  }  }}
        {{#  if(d.status == -1){  }}
        <a class="layui-btn" lay-event="unfrozen">开启</a>
        {{#  }  }}
        <a class="layui-btn" lay-event="delete">删除</a>
    </div>
</script>

<script type="text/html" id="website_info">
    <div class="ns-table-tuwen-box">
        <div class="ns-img-box img_block_sty">
            {{#  if(d.logo){  }}
            <img layer-src src="{{ns.img(d.logo.split(',')[0])}}" class="img_sty"/>
			{{#  }else{  }}
                 <img layer-src src="<?php echo img($default_img['default_city_img']); ?>" class="img_sty"/>
            {{#  }  }}
        </div>
        <div class="ns-font-box">
            <a href="javascript:;" class="ns-multi-line-hiding ns-text-color" title="{{d.title}}">{{d.title}}</a>
        </div>
    </div>
</script>

<script>
    function clickAdd()
    {
        location.href = ns.url('city://admin/website/add');
    }

    var start_time,end_time;
    layui.use(['laydate','form', 'laytpl'], function () {
        var laydate = layui.laydate,
            laytpl = layui.laytpl,
            form = layui.form,
            repeat_flag = false;

        form.render();

        //开始时间
        laydate.render({
            elem: '#start_time', //指定元素
            type: 'datetime'
            /* done: function(value, date, endDate){
                start_time = ns.date_to_time(value);
            } */
        });
        //结束时间
        laydate.render({
            elem: '#end_time', //指定元素
            type: 'datetime'
            /* done: function(value, date, endDate){
                end_time = ns.date_to_time(value);
            } */
        });

        /**
         * 搜索功能
         */
        form.on('submit(search)', function (data) {
            // data.field.start_time = start_time;
            // data.field.end_time = end_time;
            table.reload({
                page: {
                    curr: 1
                },
                where: data.field
            });
            return false;
        });

        var table = new Table({
            elem: '#account_list',
            url: ns.url("city://admin/Website/lists"),
            cols: [
                [{
                    field: 'title',
                    title: '站点信息',
                    unresize: 'false',
                    width: '15%',
                    templet: '#website_info',
                }, {
                    field: 'site_area_name',
                    title: '分站城市',
                    unresize: 'false',
                    width: '8%'
                }, {
                    field: 'username',
                    title: '管理员',
                    unresize: 'false',
                    width: '7%'
                }, {
                    field: 'account',
                    title: '<div class="ns-prompt-block" style="justify-content: flex-end">' +
                        '账户金额' +
                        '<div class="ns-prompt">' +
                        '<i class="iconfont iconwenhao1 required ns-point"></i>' +
                        '<div class="ns-point-box ns-reason-box ns-prompt-box" >' +
                        '<div class="ns-prompt-con">' +
                        '<p>1、帐户金额的来源：城市分站结算的店铺入驻续签费用的佣金、订单结算的佣金。</p>' +
                        '<p>2、平台根据城市分站的帐户金额进行实际打款结算。</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>',
                    unresize: 'false',
                    width: '8%',
                    align: 'right',
                    templet: function (data) {
                        return '<p style="text-align: right">￥' + data.account + '</p>';
                    }
                }, {
                    field: 'shop_rate',
                    title: '<p style="text-align: right">开店分佣比率</p>',
                    unresize: 'false',
                    width: '10%',
                    templet: function (data) {
                        return '<p style="text-align: right">' + data.shop_rate + '%</p>';
                    }
                }, {
                    field: 'order_rate',
                    title: '<p style="text-align: right">订单分佣比率</p>',
                    unresize: 'false',
                    width: '10%',
                    templet: function (data) {
                        return '<p style="text-align: right">' + data.order_rate + '%</p>';
                    }
                }, {
                    field: 'web_phone',
                    title: '联系方式',
                    unresize: 'false',
                    width: '8%'
                }, {
                    title: '状态',
                    unresize: 'false',
                    width: '5%',
                    templet: function (data) {
                        return data.status == 1 ? '正常' : '关闭';
                    }
                }, {
                    title: '创建时间',
                    unresize: 'false',
                    width: '12%',
                    templet: function (res) {
                        if (res.create_time == 0) {
                            return '--';
                        } else {
                            return ns.time_to_date(res.create_time)
                        }
                    }
                }, {
                    title: '操作',
                    toolbar: '#action',
                    unresize: 'false',
                    width: '17%'
                }]
            ]
        });

        /**
         * 监听工具栏操作
         */
        table.tool(function (obj) {
            var data = obj.data;
            switch (obj.event) {
                case 'detail': //详情
                    location.href = ns.url("city://admin/website/detail", {"website_id": data.site_id});
                    break;
                case 'edit': //编辑
                    location.href = ns.url("city://admin/website/edit", {"website_id": data.site_id});
                    break;
                case 'apply_pay': //转账
                    applyPay(data);
                    break;
                case 'delete'://删除

                    layer.confirm('确定要删除该分站吗?', function () {
                        if (repeat_flag) return;
                        repeat_flag = true;

                        $.ajax({
                            url: ns.url("city://admin/website/delete"),
                            data: {website_id: data.site_id},
                            dataType: 'JSON',
                            type: 'POST',
                            success: function (res) {
                                layer.msg(res.message);
                                repeat_flag = false;

                                if (res.code == 0) {
                                    table.reload();
                                }
                            }
                        });
                    });
                    break;

                case 'frozen'://冻结

                    layer.confirm('确定要关闭该分站吗?', function () {
                        if (repeat_flag) return;
                        repeat_flag = true;

                        $.ajax({
                            url: ns.url("city://admin/website/frozen"),
                            data: {website_id: data.site_id},
                            dataType: 'JSON',
                            type: 'POST',
                            success: function (res) {
                                layer.msg(res.message);
                                repeat_flag = false;

                                if (res.code == 0) {
                                    table.reload();
                                }
                            }
                        });
                    });

                    break;
                case 'unfrozen'://解冻

                    layer.confirm('确定要开启该分站吗?', function () {
                        if (repeat_flag) return;
                        repeat_flag = true;

                        $.ajax({
                            url: ns.url("city://admin/website/unfrozen"),
                            data: {website_id: data.site_id},
                            dataType: 'JSON',
                            type: 'POST',
                            success: function (res) {
                                layer.msg(res.message);
                                repeat_flag = false;

                                if (res.code == 0) {
                                    table.reload();
                                }
                            }
                        });
                    });

                    break;
            }

            /**
             * 转账
             */
            function applyPay(data) {
                laytpl($("#applyPay").html()).render(data, function (html) {
                    layer_pass = layer.open({
                        title: '分站转账',
                        skin: 'layer-tips-class',
                        type: 1,
                        area: ['800px'],
                        content: html,
                    });
                });

                //转账凭证
                var paying_money_certificate_upload = new Upload({
                    elem: '#paying_money_certificate',
					url: ns.url("admin/upload/upload")
                });

                //提交
                form.on('submit(repass)', function (data) {
                    field = data.field;

                    if (parseFloat(field.account) < parseFloat(field.money)) {
                        layer.msg('转账金额不能大于分站城市可用余额', {icon: 5, anim: 6});
                        return;
                    }

                    if (repeat_flag) return;
                    repeat_flag = true;
					
					//删除图片
					if(!data.field.paying_money_certificate) paying_money_certificate_upload.delete();
					
                    $.ajax({
                        url: ns.url("city://admin/withdraw/withdraw"),
                        data: data.field,
                        dataType: 'JSON',
                        type: 'POST',
                        success: function (res) {
                            layer.msg(res.message);
                            repeat_flag = false;

                            if (res.code == 0) {
                                layer.closeAll("page");
                                table.reload();
                            }
                        }
                    });

                });

                //表单验证
                form.verify({
                    money: function (value, item) {
                        var str = $(item).parents(".layui-form-item").find("label").text().split("*").join("");
                        str = str.substring(0, str.length - 1);

                        if (value <= 0) {
                            return str + "必须大于0";
                        }

                        var arrMen = value.split(".");
                        var val = 0;
                        if (arrMen.length == 2) {
                            val = arrMen[1];
                        }
                        if (val.length > 2) {
                            return str + "最多可保留两位小数";
                        }
                    }
                });
            }
        });

        $(".withdrawal-record").click(function () {
            location.href = ns.url("shop/shopwithdraw/lists");
        });


    })
</script>

<!-- 重置密码弹框html -->
<script type="text/html" id="applyPay">
    <div class="layui-form" lay-filter="form">

        <div class="layui-form-item">
            <label class="layui-form-label">分站城市：</label>
            <div class="layui-input-block">
                <p class="ns-input-text ">{{ d.site_area_name }}</p>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">可用余额：</label>
            <div class="layui-input-block">
                <p class="ns-input-text ">￥ {{d.account}}</p>
            </div>
        </div>
		
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="required">*</span>转账金额：</label>
            <div class="layui-input-block ns-len-long">
                <input type="number" min="0" name="money" lay-verify="required|money" class="layui-input ns-len-short">
            </div>
        </div>
		
        <div class="layui-form-item">
            <label class="layui-form-label img-upload-lable">支付凭证：</label>
            <div class="layui-input-block img-upload">
                <div class="upload-img-block">
					
					<div class="upload-img-box">
						<div class="ns-upload-default" id="paying_money_certificate">
							<div class="upload">
								<img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/upload_img.png"/>
								<p>点击上传</p>
							</div>
						</div>
						<div class="operation">
							<div>
								<i title="图片预览" class="iconfont iconreview js-preview" style="margin-right: 20px;"></i>
								<i title="删除图片" class="layui-icon layui-icon-delete js-delete"></i>
							</div>
							<div class="replace_img js-replace">点击替换</div>
						</div>
						<input type="hidden" name="paying_money_certificate" value="">
					</div>
					
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">付款凭证说明：</label>
            <div class="layui-input-block ns-len-long">
                <textarea name="paying_money_certificate_explain" class="layui-textarea"></textarea>
            </div>
        </div>

        <input type="hidden" name="account" value="{{ d.account }}">
        <input type="hidden" name="website_id" value="{{ d.site_id }}">
        <div class="ns-form-row">
            <button class="layui-btn ns-bg-color" lay-submit lay-filter="repass">确定</button>
            <button class="layui-btn layui-btn-primary" onclick="closePass()">返回</button>
        </div>
    </div>
</script>
<script>
    function closePass() {
        layer.close(layer_pass);
    }
</script>

</body>
</html>