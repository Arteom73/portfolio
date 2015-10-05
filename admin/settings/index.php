<?include $_SERVER['DOCUMENT_ROOT'] . '/admin/header.php'?>
	<?if($login_fail):?>
	<div class="alert alert-danger" role="alert"><?=$login_fail?></div>
	<?endif;?>
	<form action="." method="post">
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" class="form-control" name="login" placeholder="Current login">
		</div>
		<br>
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-alert"></i></span>
			<input type="password" class="form-control" name="password" placeholder="Current password" >
		</div>
		<br>
		<br>
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" class="form-control" name="login" placeholder="New login">
		</div>
		<br>
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-alert"></i></span>
			<input type="password" class="form-control" name="password" placeholder="New password" >
		</div>
		<br>
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-alert"></i></span>
			<input type="password" class="form-control" name="password_confirm" placeholder="Password confirm" >
		</div>
		<br>
		<br>
		<div class="btn-group">
		<button class="btn btn-default" name="login_change">
			<i class="glyphicon glyphicon-sunglasses"></i> Login
		</button>
		</div>
	</form>
<?include $_SERVER['DOCUMENT_ROOT'] . '/admin/footer.php'?>