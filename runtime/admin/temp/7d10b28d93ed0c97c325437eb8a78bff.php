<?php /*a:2:{s:64:"/www/wwwroot/niushop1.bucuoya.cn/app/admin/view/login/login.html";i:1619851180;s:57:"/www/wwwroot/niushop1.bucuoya.cn/app/admin/view/base.html";i:1619851154;}*/ ?>
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
	
<link rel="stylesheet" type="text/css" href="http://niushop1.bucuoya.cn/app/admin/view/public/css/login.css" />

</head>
<body>

<div class="layui-container">
	<div class="layui-form login-form">
		<div class="ns-login-logo">
			<img src="http://niushop1.bucuoya.cn/app/admin/view/public/img/login/login_logo.png" />
		</div>
		<div class="layui-form-title">
			<h1>多商户后台登录系统</h1>
		</div>

		<div class="layui-form-item">
			<img class="ns-input-icon" src="http://niushop1.bucuoya.cn/app/admin/view/public/img/login/username.png" />
			<input type="text" name="username" lay-verify="userName" placeholder="请输入用户名" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-item">
			<img class="ns-input-icon" src="http://niushop1.bucuoya.cn/app/admin/view/public/img/login/password.png" />
			<input type="password" name="password" lay-verify="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
		</div>

		<?php if($admin_login == 1): ?>
		<div class="layui-form-item verify-code-box">
			<input type="text" name="captcha" lay-verify="verificationCode" placeholder="请输入验证码" class="layui-input" value="">
			<div class="verify-code-img">
				<img id='verify_img' src="<?php echo htmlentities($captcha['img']); ?>" alt='captcha' onclick="verificationCode()"/>
			</div>
		</div>
		<input type="hidden" name="captcha_id" value="<?php echo htmlentities($captcha['id']); ?>">
		<?php endif; ?>

		<div class="layui-form-item ns-login-btn">
			<button class="layui-btn layui-btn-fluid ns-bg-color" lay-submit lay-filter="login">登 录</button>
		</div>
	</div>

	<div class="ns-login-bottom">
		<a class="ns-footer-img" href="#"><img src="<?php if(!empty($copyright['logo'])): ?> <?php echo img($copyright['logo']); else: ?>http://niushop1.bucuoya.cn/public/static/img/copyright_logo.png<?php endif; ?>" /></a>
		<p>
			<?php if(!(empty($copyright['company_name']) || (($copyright['company_name'] instanceof \think\Collection || $copyright['company_name'] instanceof \think\Paginator ) && $copyright['company_name']->isEmpty()))): ?>
			<a href="<?php if(!(empty($copyright['copyright_link']) || (($copyright['copyright_link'] instanceof \think\Collection || $copyright['copyright_link'] instanceof \think\Paginator ) && $copyright['copyright_link']->isEmpty()))): ?><?php echo htmlentities($copyright['copyright_link']); else: ?>javascript:;<?php endif; ?>" target="_blank"><?php echo htmlentities($copyright['company_name']); ?></a>
			<?php else: ?>
			<a href="https://www.why.com" target="_blank">科技发展有限公司</a>
			<?php endif; if(!(empty($copyright['icp']) || (($copyright['icp'] instanceof \think\Collection || $copyright['icp'] instanceof \think\Paginator ) && $copyright['icp']->isEmpty()))): ?>
			<a href="https://beian.miit.gov.cn/" target="_blank">&nbsp;&nbsp;备案号<?php echo htmlentities($copyright['icp']); ?></a>
			<?php endif; ?>
		</p>
		<?php if(!(empty($copyright['gov_record']) || (($copyright['gov_record'] instanceof \think\Collection || $copyright['gov_record'] instanceof \think\Paginator ) && $copyright['gov_record']->isEmpty()))): ?><a class="gov-box" href="<?php echo htmlentities($copyright['gov_url']); ?>" target="_blank"><img src="http://niushop1.bucuoya.cn/app/shop/view/public/img/gov_record.png" alt=""><?php echo htmlentities($copyright['gov_record']); ?></a><?php endif; ?>
	</div>
</div>


<script>
	layui.use('form', function() {
		var form = layui.form,
			repeat_flag = false; //防重复标识

		/**
		 * 登录
		 */
		form.on('submit(login)', function(data) {

			if (repeat_flag) return false;
			repeat_flag = true;

			$.ajax({
				type: "POST",
				url: "<?php echo url('admin/login/login'); ?>",
				data: data.field,
				dataType: "JSON",
				success: function(res) {
					if (res.code == 0) {
						layer.msg('登录成功',{anim: 5,time: 500},function () {
							window.location = "<?php echo url('admin/index/index'); ?>";
						})
					} else {
						layer.msg(res.message);
						repeat_flag = false;
						verificationCode();
					}
				}
			});
		});

		$(document).keydown(function(event) {
			if (event.keyCode == 13) {
				$(".ns-login-btn button").trigger("click");
			}
		});

		/**
		 * 表单验证
		 */
		form.verify({
			userName: function(value) {
				if (!value) {
					return "用户名不能为空";
				}
			},
			password: function(value) {
				if (!value) {
					return "密码不能为空";
				}
			},
			verificationCode: function(value) {
				if (!value) {
					return "验证码不能为空";
				}
			}

		});
	});
	
	/**
	 * 验证码
	 */
	function verificationCode(){
		$.ajax({
			type: "get",
			url: "<?php echo url('admin/login/captcha'); ?>",
			dataType: "JSON",
			async: false,
			success: function (res) {
				var data = res.data;
				$("#verify_img").attr("src",data.img);
				$("input[name='captcha_id']").val(data.id);
			}
		});
	}
</script>

</body>
</html>