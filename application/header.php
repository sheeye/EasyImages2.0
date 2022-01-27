<?php
require_once __DIR__ . '/function.php';
require_once APP_ROOT . '/application/total_files.php';
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit" />
	<meta name="force-rendering" content="webkit" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo  $config['title']; ?></title>
	<meta name="keywords" content="<?php echo  $config['keywords']; ?>" />
	<meta name="description" content="<?php echo  $config['description']; ?>" />
	<link rel="shortcut icon" href="<?php echo $config['domain']; ?>/favicon.ico" type="image/x-icon" />
	<link rel="dns-prefetch" href="<?php echo $config['imgurl']; ?>" />
	<link rel="dns-prefetch" href="<?php echo $config['static_cdn_url']; ?>" />
	<link href="<?php static_cdn(); ?>/public/static/zui/css/zui.min.css" rel="stylesheet">
	<link href="<?php static_cdn(); ?>/public/static/zui/theme/zui-theme-<?php echo $config['theme']; ?>.css" rel="stylesheet">
	<link href="<?php static_cdn(); ?>/public/static/zui/lib/uploader/zui.uploader.min.css" rel="stylesheet">
	<link href="<?php static_cdn(); ?>/public/static/nprogress.min.css" rel="stylesheet">
	<script src="<?php static_cdn(); ?>/public/static/zui/lib/jquery/jquery-3.4.1.min.js"></script>
	<script src="<?php static_cdn(); ?>/public/static/zui/js/zui.min.js"></script>
	<script src="<?php static_cdn(); ?>/public/static/qrcode.min.js"></script>
	<script src="<?php static_cdn(); ?>/public/static/zui/lib/clipboard/clipboard.min.js"></script>
	<script src="<?php static_cdn(); ?>/public/static/nprogress.min.js"></script>
	<!--[if lt IE 9]>
    <script src="<?php static_cdn(); ?>/public/static/zui/lib/ieonly/html5shiv.js"></script>
    <script src="<?php static_cdn(); ?>/public/static/zui/lib/ieonly/respond.js"></script>
    <script src="<?php static_cdn(); ?>/public/static/zui/lib/ieonly/excanvas.js"></script>
  <![endif]-->
</head>

<body class="container">
	<?php
	if ($config['ad_top']) echo $config['ad_top_info']; ?>
	<div class="page-header">
		<ul class="nav nav-pills">
			<li <?php echo getActive('index'); ?>>
				<a href="<?php echo $config['domain']; ?>">
					<i class="icon icon-home"></i> 首页
				</a>
			</li>
			<?php
			// 关闭广场非登录状态不显示广场导航
			if ($config['showSwitch'] || is_who_login('admin'))
				echo '
			<li ' . getActive('list') . '>
				<a href="' . $config['domain'] . '/application/list.php">
					<i class="icon icon-th"></i> 广场 <span class="label label-badge label-success">' . get_file_by_glob(APP_ROOT . config_path(), 'number') . '</span>
				</a>
			</li>
			';
			// 登陆状态显示设置页面
			if (is_who_login('admin')) {
				echo '
			<li ' . getActive('admin.inc') . ';><a href="' . $config['domain'] . '/admin/admin.inc.php' . '">
				<i class="icon icon-cogs"></i> 设置</a>
			</li>
			';
				// 登陆状态下开启统计页面与导航
				if ($config['chart_on'])
					echo '
			<li ' . getActive('chart') . '><a href="' . $config['domain'] . '/admin/chart.php' . '">
				<i class="icon icon-pie-chart"></i> 统计</a>
			</li>
			';
			}
			?>
		</ul>
	</div>
	<!-- 顶部导航栏END -->