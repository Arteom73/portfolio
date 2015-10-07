<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/init.php');

$message = '';

// if ($is_login) {
// 	$id = $_POST['id'];

// 	if ($id) {
// 		$query = $db->prepare('SELECT approve FROM reviews WHERE id=:id LIMIT 1');
// 		$query->execute(array(':id' => $id));
// 		$query = $query->fetchAll();
// 	}

// 	if ($query) {
// 		if($query[0]['approve'] == 0) {

// 			$value = 1;
// 			$message = 'Approved';

// 		} else {

// 			$value = 0;
// 			$message = 'Disroved';

// 		}

// 		$sql = $db->prepare('UPDATE reviews set approve = :value WHERE id=:id');
// 		$sql->bindParam(':id', $id);
// 		$sql->bindParam(':value', $value);
// 		if (!$sql->execute()) {

// 			$message = 'Error!';

// 		}
// 	}
// }
echo $message;

?>