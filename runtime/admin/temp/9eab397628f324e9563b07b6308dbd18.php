<?php /*a:2:{s:64:"/www/wwwroot/niushop1.bucuoya.cn/app/admin/view/index/index.html";i:1619851178;s:57:"/www/wwwroot/niushop1.bucuoya.cn/app/admin/view/base.html";i:1619851154;}*/ ?>
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
	
<link rel="stylesheet" href="http://niushop1.bucuoya.cn/app/admin/view/public/css/index.css">

</head>
<body>

<div class="ns-logo">
	<div class="logo-box">
		<img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/logo.png">
	</div>
	<span>B2B2C多商户平台端</span>
	<span>服务电话：400-886-7993</span>
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
				<?php endif; if($need_upgrade == 1): ?>
<p class="version-upgrade ns-border-color">
    温馨提示：多商户系统发布了最新版本，请尽快进行升级
    <span>x</span>
</p>
<?php endif; ?>

<div class="index-box">
    <div class="index-content">
        <div class="basic-info">
            <blockquote class="layui-elem-quote">基础信息 <span class="ns-card-sub"></span></blockquote>

            <div class="layui-card ns-survey-info ns-card-common">
                <div class="layui-card-body">
                    <div class="ns-survey-detail-con">
                        <div class="ns-survey-detail-aco">今日订单数
                            <div class="ns-prompt-block" style="left: 100px;top: 20px;">
                                <div class="ns-prompt">
                                    <i class="iconfont iconwenhao1 required ns-growth"></i>
                                    <div class="ns-growth-box ns-reason-box ns-reason-growth ns-prompt-box" style="top: 30px;left: -64px;">
                                        <div class="ns-prompt-con">
                                            <p>只有经过支付的订单才会参与统计,支付后关闭的订单也参与统计。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ns-survey-line"></div>
                        <div class="ns-survey-bottom">
                            <p class="ns-survey-detail-num ns-text-color"><?php echo htmlentities($stat_day['order_pay_count']); ?></p>
                            <div class="ns-survey-detail-rate">
                                <?php 
                                $t = $stat_day['order_pay_count'];
                                $y = $stat_yesterday['order_pay_count'];
                                 ?>
                                <div>日同比 <span><?php echo $t>$y ? '+'  :  ''; ?><?php echo htmlentities($day_rate['order_pay_count']); ?></span><i class="layui-icon layui-icon-triangle-d <?php echo $t>$y ? 'layui-icon-increase ns-text-color'  : htmlentities($t == $y ? 'is-null' : ''); ?>"></i></div>
                                <div>昨日订单数 <span><?php echo htmlentities($stat_yesterday['order_pay_count']); ?> </span></div>
                            </div>
                            <div class="ns-survey-line"></div>
                            <div class="ns-survey-detail-split"></div>
                            <div class="ns-survey-detail-total">
                                <span>订单总数</span>
                                <span><?php echo htmlentities($stat_info['order_pay_count']); ?></span>
                            </div>
                            <!-- <p class="ns-survey-detail-yesterday">昨日：<?php echo htmlentities($stat_yesterday['order_pay_count']); ?></p> -->
                            <div class="title ns-prompt-block">
                                <div class="ns-prompt">
                                    <button class="layui-btn layui-btn-primary ns-text-color ns-border-color ns-survey-yesterday-btn">昨日</button>
                                    <div class="ns-prompt-box">
                                        <div class="ns-prompt-con">
                                            订单数：<?php echo htmlentities($stat_yesterday['order_pay_count']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ns-survey-detail-con">
                        <p class="ns-survey-detail-aco">今日销售额(元)</p>
                        <div class="ns-survey-line"></div>
                        <div class="ns-survey-bottom">
                            <p class="ns-survey-detail-num ns-text-color"><?php if(isset($stat_day['order_total'])): ?><?php echo htmlentities($stat_day['order_total']); else: ?> 0.00 <?php endif; ?></p>
                            <div class="ns-survey-detail-rate">
                                <?php 
                                $t = $stat_day['order_total'];
                                $y = $stat_yesterday['order_total'];
                                 ?>
                                <div>日同比 <span><?php echo $t>$y ? '+'  :  ''; ?><?php echo htmlentities($day_rate['order_total']); ?></span><i class="layui-icon layui-icon-triangle-d <?php echo $t>$y ? 'layui-icon-increase ns-text-color'  : htmlentities($t == $y ? 'is-null' : ''); ?>"></i></div>
                                <div>昨日销售额(元) <span><?php echo htmlentities($stat_yesterday['order_total']); ?> </span>
                                    <!--								<i class="layui-icon layui-icon-triangle-d"></i>-->
                                </div>
                            </div>
                            <div class="ns-survey-line"></div>
                            <div class="ns-survey-detail-split"></div>
                            <div class="ns-survey-detail-total">
                                <span>销售总额</span>
                                <span><?php echo htmlentities($stat_info['order_total']); ?></span>
                            </div>
                            <!-- <p class="ns-survey-detail-yesterday">昨日：<?php if(isset($stat_yesterday['order_total'])): ?><?php echo htmlentities($stat_yesterday['order_total']); else: ?> 0.00 <?php endif; ?></p> -->
                            <div class="title ns-prompt-block">
                                <div class="ns-prompt">
                                    <button class="layui-btn layui-btn-primary ns-text-color ns-border-color ns-survey-yesterday-btn">昨日</button>
                                    <div class="ns-prompt-box">
                                        <div class="ns-prompt-con">
                                            销售额：<?php if(isset($stat_yesterday['order_total'])): ?><?php echo htmlentities($stat_yesterday['order_total']); else: ?> 0.00 <?php endif; ?>元
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ns-survey-detail-con">
                        <p class="ns-survey-detail-aco">今日新增会员数</p>
                        <div class="ns-survey-line"></div>
                        <div class="ns-survey-bottom">
                            <p class="ns-survey-detail-num ns-text-color"><?php echo htmlentities($stat_day['member_count']); ?></p>
                            <div class="ns-survey-detail-rate">
                                <?php 
                                $t = $stat_day['member_count'];
                                $y = $stat_yesterday['member_count'];
                                 ?>
                                <div>日同比 <span><?php echo $t>$y ? '+'  :  ''; ?><?php echo htmlentities($day_rate['member_count']); ?></span><i class="layui-icon layui-icon-triangle-d <?php echo $t>$y ? 'layui-icon-increase ns-text-color'  : htmlentities($t == $y ? 'is-null' : ''); ?>"></i></div>
                                <div>昨日新增会员数 <span><?php echo htmlentities($stat_yesterday['member_count']); ?> </span></div>
                            </div>
                            <div class="ns-survey-line"></div>
                            <div class="ns-survey-detail-split"></div>
                            <div class="ns-survey-detail-total">
                                <span>会员总数</span>
                                <span><?php echo htmlentities($member_count); ?></span>
                            </div>
                            <div class="title ns-prompt-block">
                                <div class="ns-prompt">
                                    <button class="layui-btn layui-btn-primary ns-text-color ns-border-color ns-survey-yesterday-btn">昨日</button>
                                    <div class="ns-prompt-box">
                                        <div class="ns-prompt-con">
                                            会员数：<?php if(isset($stat_yesterday['member_count'])): ?><?php echo htmlentities($stat_yesterday['member_count']); else: ?> 0 <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ns-survey-detail-con">
                        <p class="ns-survey-detail-aco">今日申请店铺数</p>
                        <div class="ns-survey-line"></div>
                        <div class="ns-survey-bottom">
                            <p class="ns-survey-detail-num ns-text-color"><?php echo htmlentities($today_apply_count); ?></p>
                            <div class="ns-survey-detail-rate">
                                <?php 
                                $t = $today_apply_count;
                                $y = $yesterday_apply_count;
                                 ?>
                                <div>日同比 <span><?php echo $t>$y ? '+'  :  ''; ?><?php echo htmlentities($day_rate['shop_count']); ?></span><i class="layui-icon layui-icon-triangle-d <?php echo $t>$y ? 'layui-icon-increase ns-text-color'  : htmlentities($t == $y ? 'is-null' : ''); ?>"></i></div>
                                <div>昨日申请店铺数 <span><?php echo htmlentities($yesterday_apply_count); ?> </span></div>
                            </div>
                            <div class="ns-survey-line"></div>
                            <div class="ns-survey-detail-split"></div>
                            <div class="ns-survey-detail-total">
                                <span>店铺总数</span>
                                <span><?php echo htmlentities($shop_total_count); ?></span>
                            </div>
                            <div class="title ns-prompt-block">
                                <div class="ns-prompt">
                                    <button class="layui-btn layui-btn-primary ns-text-color ns-border-color ns-survey-yesterday-btn">昨日</button>
                                    <div class="ns-prompt-box">
                                        <div class="ns-prompt-con">
                                            申请店铺数：<?php echo htmlentities($yesterday_apply_count); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="statistics-wrap">
                <div class="item">
                    <div class="flex-box f_box_border"  onclick="location.href='<?php echo addon_url('admin/order/lists'); ?>#!order_status=0'">
                        <div class="num"><?php echo htmlentities($num_data['waitpay']); ?></div>
                        <h5 class="title">待付款订单</h5>
                    </div>
                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('admin/order/lists'); ?>#!order_status=1'">
                        <div class="num"><?php echo htmlentities($num_data['waitsend']); ?></div>
                        <h5 class="title">待发货订单</h5>
                    </div>
                </div>

                <?php if($is_fenxiao == 0): ?>
                <div class="item">
                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('admin/order/lists'); ?>#!order_status=3'">
                        <div class="num"><?php echo htmlentities($num_data['waitconfirm']); ?></div>
                        <h5 class="title">待收货订单</h5>
                    </div>
                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('admin/order/lists'); ?>#!order_status=10'">
                        <div class="num"><?php echo htmlentities($num_data['complete']); ?></div>
                        <h5 class="title">已完成订单</h5>
                    </div>
                </div>
                <?php endif; ?>

                <div class="item">
                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('admin/order/lists'); ?>#!order_status=refunding'">
                        <div class="num"><?php echo htmlentities($num_data['refund']); ?></div>
                        <h5 class="title">退款中订单</h5>
                    </div>

                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('admin/complain/lists'); ?>#!complain_status=1'">
                        <div class="num"><?php echo htmlentities($num_data['complain_count']); ?></div>
                        <h5 class="title">维权订单</h5>
                    </div>
                </div>

                <div class="item">
                    <div class="flex-box f_box_border"  onclick="location.href='<?php echo addon_url('admin/goods/lists'); ?>'">
                        <div class="num"><?php echo htmlentities($num_data['goods_total']); ?></div>
                        <h5 class="title">出售中商品</h5>
                    </div>
                    <div class="flex-box f_box_border"  onclick="location.href='<?php echo addon_url('admin/goods/lists'); ?>'">
                        <div class="num"><?php echo htmlentities($num_data['warehouse_goods']); ?></div>
                        <h5 class="title">仓库中商品</h5>
                    </div>
                </div>

                <?php if($is_fenxiao == 1): ?>
                <div class="item">
                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('fenxiao://admin/fenxiao/apply'); ?>'">
                        <div class="num"><?php echo htmlentities($num_data['apply_count']); ?></div>
                        <h5 class="title">分销商申请</h5>
                    </div>
                    <div class="flex-box f_box_border" onclick="location.href='<?php echo addon_url('fenxiao://admin/withdraw/lists'); ?>'">
                        <div class="num"><?php echo htmlentities($num_data['withdraw_count']); ?></div>
                        <h5 class="title">提现待审核</h5>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="echarts-wrap">
                <div class="echarts-order f_box_border">
                    <h5>近十天订单数(个)</h5>
                    <div id="order"></div>
                </div>

                <div class="echarts-money f_box_border">
                    <h5>销售额(元)</h5>
                    <div id="money"></div>
                </div>
            </div>

        </div>
        <div class="common-function">
            <blockquote class="layui-elem-quote">常用功能</blockquote>
            <div class="common-function-box layui-row">
                <a class="layui-col-md2" href="<?php echo url('admin/member/memberlist'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/member_check.png">
                    </div>
                    <div class="ns-text-box">会员查询</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/member/addMember'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/member_add.png">
                    </div>
                    <div class="ns-text-box">会员新增</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/shop/lists'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/shop_check.png">
                    </div>
                    <div class="ns-text-box">店铺查询</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/shop/addshop'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/shop_add.png">
                    </div>
                    <div class="ns-text-box">店铺新增</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/shopreopen/reopen'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/shop_renewal.png">
                    </div>
                    <div class="ns-text-box">店铺续签</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/goods/lists'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/goods_check.png">
                    </div>
                    <div class="ns-text-box">商品查询</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/goodscategory/lists'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/goods_category.png">
                    </div>
                    <div class="ns-text-box">商品分类</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/goodsbrand/lists'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/goods_brand.png">
                    </div>
                    <div class="ns-text-box">商品品牌</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/order/lists'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/order_check.png">
                    </div>
                    <div class="ns-text-box">订单查询</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/refund/lists'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/refund.png">
                    </div>
                    <div class="ns-text-box">退款维权</div>
                </a>
                <a class="layui-col-md2" href="<?php echo url('admin/express/expresscompany'); ?>">
                    <div class="ns-index-img-box">
                        <img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/index/express.png">
                    </div>
                    <div class="ns-text-box">物流公司</div>
                </a>
            </div>
        </div>
        <div class="layui-row layui-col-space10">
            <div class="system-function system_box">
                <blockquote class="layui-elem-quote">系统信息</blockquote>
                <table class="layui-table">
                    <colgroup>
                        <col width="20%">
                        <col width="30%">
                        <col width="20%">
                        <col width="30%">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="ns-bg-color-light-gray">服务器操作系统</td>
                        <td><?php echo htmlentities($system_config['os']); ?></td>
                        <td class="ns-bg-color-light-gray">服务器域名</td>
                        <td><?php echo htmlentities($system_config['dns']); ?>:<?php echo htmlentities($system_config['port']); ?></td>
                    </tr>
                    <tr>
                        <td class="ns-bg-color-light-gray">服务器环境</td>
                        <td><?php echo htmlentities($system_config['server_software']); ?></td>
                        <td class="ns-bg-color-light-gray">PHP版本</td>
                        <td><?php echo htmlentities($system_config['php_version']); ?></td>
                    </tr>
                    <tr>
                        <td class="ns-bg-color-light-gray">文件上传限制</td>
                        <td><?php echo htmlentities($system_config['upload_max_filesize']); ?></td>
                        <td class="ns-bg-color-light-gray">GD版本</td>
                        <td><?php echo htmlentities($system_config['gd_version']); ?></td>
                    </tr>
                    <tr>
                        <td class="ns-bg-color-light-gray">sockets开启</td>
                        <td><?php if($system_config['sockets'] == true): ?>已开启<?php else: ?><span style="color:red;">未开启，邮箱功能将无法正常使用</span><?php endif; ?></td>
                        <td class="ns-bg-color-light-gray">curl支持</td>
                        <td><?php if($system_config['curl'] == true): ?>支持<?php else: ?><span style="color:red;">不支持，微信和支付宝等功能将无法正常使用</span><?php endif; ?></td>
                    </tr>
                    <tr>
                        <td class="ns-bg-color-light-gray">openssl开启</td>
                        <td><?php if($system_config['openssl'] == true): ?>已开启<?php else: ?><span style="color:red;">未开启，不支持https</span><?php endif; ?></td>
                        <td class="ns-bg-color-light-gray">fileinfo开启</td>
                        <td><?php if($system_config['fileinfo'] == true): ?>已开启<?php else: ?><span style="color:red;">未开启，将无法获取上传文件类型，导致上传图片失败</span><?php endif; ?></td>
                    </tr>
                    <tr>
                        <td class="ns-bg-color-light-gray">upload目录权限</td>
                        <td><?php if($system_config['upload_dir_jurisdiction'] == 1): ?>可读可写<?php else: ?><span style="color:red;">不可读不可写，会造成图片无法上传和访问</span><?php endif; ?></td>
                        <td class="ns-bg-color-light-gray">runtime目录权限</td>
                        <td><?php if($system_config['runtime_dir_jurisdiction'] == 1): ?>可读可写<?php else: ?><span style="color:red;">不可读不可写，会造成编译文件缓存文件无法生成读取，是网站访问出错</span><?php endif; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


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


<script src="http://niushop1.bucuoya.cn/app/admin/view/public/js/echarts.min.js"></script>
<script>
	var time = (new Date()).getTime();
	var date = ns.time_to_date(time / 1000);
	$(".ns-card-sub").text("更新时间：" + date);

	/* 版本更新 */
    $("body").on("click",".version-upgrade",function () {
        $(this).addClass("layui-hide");
    });
    news();
    //官网新闻
    function news(){
        $.ajax({
            url: "<?php echo addon_url('admin/index/news'); ?>",
            type: "POST",
            dataType: "JSON",
            success: function(res) {

                if(res.code < 0 || res.data.list.length == 0){
                    $(".news-list").append('<p class="ns-text-color-dark-gray"><span class="ns-bg-color">1</span>暂时没有官网资讯！</p>');
                }else{
                    $.each(res.data.list, function(key, value) {
                        var sort = key + 1;
                        $(".news-list").append('<p class="ns-text-color-dark-gray"><span class="ns-bg-color">'+sort+'</span><a href="'+ value.url +'" target="_blank" >'+value.title+'！</a></p>');
                    });
                }
            }
        });
    }
</script>

<script>
    var ten_day_json = <?php echo json_encode($ten_day, JSON_UNESCAPED_UNICODE); ?>;

    function getDay(day){
        var today = new Date();
        var targetday_milliseconds = today.getTime() + 1000 * 60 * 60 * 24 * day;
        today.setTime(targetday_milliseconds); //注意，这行是关键代码
        var tYear = today.getFullYear();
        var tMonth = today.getMonth();
        var tDate = today.getDate();
        tMonth = doHandleMonth(tMonth + 1);
        tDate = doHandleMonth(tDate);
        return tMonth + "-" + tDate;
    }

    function doHandleMonth(month){
        var m = month;
        if(month.toString().length == 1){
            m = "0" + month;
        }
        return m;
    }

    var data = [getDay(-9), getDay(-8), getDay(-7), getDay(-6), getDay(-5), getDay(-4), getDay(-3), getDay(-2), getDay(-1), getDay(0)];
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('order'));

    // 指定图表的配置项和数据
    option = {
        xAxis: {
            type: 'category',
            data: data
        },
        yAxis: {
            type: 'value'
        },
        tooltip: {
            formatter: function(params, ticket, callback) {
                return "日期：" + data[params.dataIndex] + '<br />' + params.seriesName + "：" + params.value;
            },
            backgroundColor: 'rgba(0, 0, 0, 0.5)',
            padding: [5, 10],
            textStyle: {
                color: '#fff',
                lineHeight: 30,
            }
        },
        series: [{
            name: ['订单数'],
            data: ten_day_json.order_pay_count,
            type: 'bar',
            showBackground: true,
            barCategoryGap: '50%',
            itemStyle: {
                color: new echarts.graphic.LinearGradient(
                    0, 0, 0, 1,
                    [
                        {offset: 0, color: '#4685FD'},
                        {offset: 1, color: '#4685FD'}
                    ]
                )
            }
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);

    // 基于准备好的dom，初始化echarts实例
    var moneyChart = echarts.init(document.getElementById('money'));

    // 指定图表的配置项和数据
    moneyOption = {
        xAxis: {
            type: 'category',
            data: data
        },
        yAxis: {
            type: 'value'
        },
        tooltip: {
            trigger: 'axis',
            showContent: true,
            backgroundColor: 'rgba(0, 0, 0, 0.5)',
            padding: [5, 10],
            textStyle: {
                color: '#fff',
                lineHeight: 30,
            },
            formatter: function(params, ticket, callback) {
                return "日期：" + params[0].axisValue + '<br />' + params[0].seriesName + "：" + params[0].value + "元";
            },
        },
        series: [{
            name: ['销售额'],
            data: ten_day_json.order_total,
            type: 'line',
            smooth: true,
            itemStyle: {
                color: '#4685FD'
            }
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    moneyChart.setOption(moneyOption);
</script>

</body>
</html>