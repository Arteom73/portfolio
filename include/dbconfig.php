<?
$dbname = 'coder-free';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, array(PDO::ATTR_PERSISTENT => true));