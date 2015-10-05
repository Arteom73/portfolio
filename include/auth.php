<?php

session_start();

$is_login = 0;

if(isset($_POST['login']) && isset($_POST['password'])){

	$login = htmlspecialchars($_POST['login']);
	$password = md5($_POST['password']);

	$query = $db->prepare('SELECT * FROM admin WHERE login=:login AND password=:password  LIMIT 1');
	$query->execute(array(':login' => $login,':password' => $password));
	$query = $query->fetchAll();

	if($query){

		function generateCode($length = 6) { 
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
		    $code = ""; 
		    $clen = strlen($chars) - 1;   
		    while (strlen($code) < $length) { 
		        $code .= $chars[mt_rand(0,$clen)];   
		    } 
		    return $code; 
		}

		$hash = md5(generateCode(10));
		$date = date('l jS \of F Y h:i:s A');

		$sql = $db->prepare("UPDATE admin SET last_login=:last_login, hash=:hash WHERE login=:login AND password=:password");
		$sql->bindParam(':last_login', $date);
		$sql->bindParam(':hash', $hash);
		$sql->bindParam(':login', $login);
		$sql->bindParam(':password', $password);
		$sql->execute();

		if($_POST['remember']) {

			setcookie('login', $login, time()+60*60*24*30, '/'); 
			setcookie('login_hash', $hash, time()+60*60*24*30, '/'); 

		} else {

			$_SESSION['login'] = $login;
			$_SESSION['login_hash'] = $hash;

		}
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin/');
		exit();

	}else{

		$login_fail .=  "Данные не верны!"; 

	}  

}

if (isset($_SESSION['login']) AND isset($_SESSION['login_hash'])) {

	$isset_login = $_SESSION['login'];
	$isset_hash = $_SESSION['login_hash'];

} elseif (isset($_COOKIE['login']) and isset($_COOKIE['login_hash'])) {

	$isset_login = $_COOKIE['login'];
	$isset_hash = $_COOKIE['login_hash'];

}
if ($isset_login AND $isset_hash) {


	$query = $db->prepare('SELECT * FROM admin WHERE login=:login AND hash=:hash LIMIT 1');
	$query->execute(array(':login' => $isset_login, ':hash' => $isset_hash));
	$query = $query->fetchAll();

	$is_login = 1;

}
if (empty($query)) {

	$is_login = 0;

	unset($_SESSION['login']);
	unset($_SESSION['login_hash']);
	unset($_COOKIE['login']); 
	unset($_COOKIE['login_hash']);

}
if($_REQUEST['logout']) {

	unset($_SESSION['login']);
	unset($_SESSION['login_hash']);
	setcookie('login', '', time()+60*60*24*30, '/'); 
	setcookie('login_hash', '', time()+60*60*24*30, '/'); 
	header('Location: http://' . $_SERVER['HTTP_HOST']); 
	exit();

}
?>