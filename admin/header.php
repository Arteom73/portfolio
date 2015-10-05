<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/init.php');

if (!$is_login) {
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin/login/');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coder-Free Admin</title>
	<link rel="stylesheet" href="/admin/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/admin/">Coder-Free Admin</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/">Home</a></li>
				<?if($is_login){?>
					<li><a href="/admin/settings/">Settings</a></li>
					<li><a href="?logout=YES">Logout</a></li>
				<?}?>
			</ul>
		</div>
	</nav>
	<div class="container">