<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/include/init.php');

$html = '';
$result = 0;

$id = $_REQUEST['id'];

if ($id && $is_login) {

	$query = $db->prepare('SELECT * FROM reviews WHERE id=:id LIMIT 1');
	$query->execute(array(':id' => $id));
	$query = $query->fetchAll();

	if ($query) {
		$html .= '<form action="" method="post" id="reviewUpdate">';
		$html .= '
			<div class="input-group">
				<span class="input-group-addon">Author</span>
				<input type="text" class="form-control" value="'.$query[0]['author'].'" name="author">
			</div><br>
		';
		$html .= '
			<div class="input-group">
				<span class="input-group-addon">Company</span>
				<input type="text" class="form-control" value="'.$query[0]['company'].'" name="company">
			</div><br>
		';
		$html .= '
			<div class="input-group">
				<span class="input-group-addon">Email</span>
				<input type="text" class="form-control" value="'.$query[0]['email'].'" name="email">
			</div><br>
		';
		$html .= '
			<div class="input-group">
				<span class="input-group-addon">Phone</span>
				<input type="text" class="form-control" value="'.$query[0]['phone'].'" name="phone">
			</div><br>
		';
		$html .= '
			<div class="input-group">
				<span class="input-group-addon">Message</span>
				<textarea class="form-control" name="message">'.$query[0]['message'].'</textarea>
			</div><br>
		';
		if($query[0]['approve']) {
			$checked = ' checked';
		} else {
			$checked = '';
		}
		$html .= '
			<label class="input-group">
				<span class="input-group-addon"><input type="checkbox" name="approve"'. $checked . '></span>
				<div class="form-control">Approve</div>
			</label>
		';
		$html .= '</form>';
		$result = 1;
	}


}

echo json_encode( 
	array(
		'html' => $html,
		'result' => $result,
		'id' => $id
		)
	);

?>