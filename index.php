<?

include_once($_SERVER['DOCUMENT_ROOT'] . '/include/init.php');

$login = "Artemon228";
$pass = md5("123456");

echo $login . "<br>" . $pass;
// $sql = $db->prepare("INSERT INTO admin(login, password) VALUES (:login, :pass)");
// $sql->bindParam(':login', $login);
// $sql->bindParam(':pass', $pass);
// $sql->execute();