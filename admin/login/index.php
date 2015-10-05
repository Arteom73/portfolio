<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/init.php');

if ($is_login) {
	header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin/');
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
			</ul>
		</div>
	</nav>
	<div class="container">
		<?if($login_fail):?>
		<div class="alert alert-danger" role="alert"><?=$login_fail?></div>
		<?endif;?>
		<form action="." method="post">
			<div class="input-group input-group-lg">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control" name="login" placeholder="Username">
			</div>
			<br>
			<div class="input-group input-group-lg">
				<span class="input-group-addon"><i class="glyphicon glyphicon-alert"></i></span>
				<input type="password" class="form-control" name="password" placeholder="Password" >
			</div>
			<br>
			<label class="input-group input-group-lg">
				<span class="input-group-addon"><input type="checkbox" name="remember"></span>
				<div class="form-control">Remember login</div>
			</label>
			<br>
			<div class="btn-group">
			<button class="btn btn-default">
				<i class="glyphicon glyphicon-sunglasses"></i> Login
			</button>
			</div>
		</form>
	</div>
	<script href="/admin/js/jquery-1.11.3.min.js"></script>
	<script href="/admin/js/bootstrap.min.js"></script>
</body>
</html>