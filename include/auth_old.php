<?php

$is_login = 0;

if(isset($_POST['login']) && isset($_POST['password'])){

	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);

	$login = $_POST['login'];
	$password = md5($_POST['password']);

	$query = $db->super_query("SELECT * FROM users  WHERE name='{$login}' AND pass='{$password}' LIMIT 1"); 

	if($query['id']){

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

		$db->query("UPDATE users SET hash='{$hash}' WHERE id='{$query['id']}'");

		if($_POST['remember']) {

			setcookie('login', 1, time()+60*60*24*30); 
			setcookie('login_hash', $hash, time()+60*60*24*30); 

		} else {

			$_SESSION['login'] = 1;
			$_SESSION['login_hash'] = $hash;

		}
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin/');
		exit();

	}else{

		$loginFail .=  "Данные не верны!"; 

	}  

} 
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
    $userdata = $db->super_query("SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
	$is_login = 1;
    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id'])) 
    {
		$is_login = 0;
		unset($_SESSION['login']);
		unset($_SESSION['login_hash']);
        setcookie('id', '', time() - 60*24*30*12, '/'); 
        setcookie('hash', '', time() - 60*24*30*12, '/');
    } 
} 
if($_REQUEST['logout']) 
{
	unset($_SESSION['login']);
	unset($_SESSION['login_hash']);
	setcookie('id', '', time() - 60*60*24*30, '/'); 
	setcookie('hash', '', time() - 60*60*24*30, '/');
	header('Location: http://' . $_SERVER['HTTP_HOST']); 
	exit();
}
?>