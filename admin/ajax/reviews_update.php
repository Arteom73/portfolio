<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/init.php');

$message = '';
$html = '';

if ($is_login) {

	$id = $_POST['id'];
	$author = htmlspecialchars($_POST['author']);
	$company = htmlspecialchars($_POST['company']);
	$email = htmlspecialchars($_POST['email']);
	$phone = htmlspecialchars($_POST['phone']);
	$message = htmlspecialchars($_POST['message']);
	$approve = htmlspecialchars($_POST['approve']);

	$approve = $approve == 'on' ? 1 : 0;

	$sql = $db->prepare('UPDATE reviews set 
		author = :author, 
		company = :company, 
		email = :email, 
		phone = :phone, 
		message = :message, 
		approve = :approve 
		WHERE id=:id');
	$sql->bindParam(':id', $id);
	$sql->bindParam(':author', $author);
	$sql->bindParam(':company', $company);
	$sql->bindParam(':email', $email);
	$sql->bindParam(':phone', $phone);
	$sql->bindParam(':message', $message);
	$sql->bindParam(':approve', $approve);

	if ($sql->execute()) {

		$message = 'Updated!';
		$result = 1;

	} else {
		$message = 'Error!';
		$result = 0;
	}
} else {
	$message = 'Error!';
	$result = 0;
}
if ($result == 1) {
	$query = $db->prepare('SELECT * FROM reviews WHERE id=:id LIMIT 1');
	$query->execute(array(':id' => $id));
	$query = $query->fetchAll();

	if ($query) {
	    $html .= '<div class="panel-heading">';
	    $html .= '<a class="js-approve-button pull-right" href="#">';
	    if ($query[0]['approve'] == 0) {
		    $html .= 'Approve';
		} else {
		    $html .= 'Disprove';
		}
	    $html .= '</a>';
	    $html .= 'Author: '.$query[0]['author'].' | Date: '.$query[0]['date'].' | IP: ' .$query[0]['ip'].' | Company: ' .$query[0]['company'].' | Approve: ' .$query[0]['approve'];
	    $html .= '</div>';
	    $html .= '<div class="panel-body js-edit-button">'.$query[0]['message'].'</div>';
	} else {
		$result = 0;
	}
}
echo json_encode(
	array(
		'message' => $message,
		'result' => $result,
		'html' => $html
		)
	);

?>