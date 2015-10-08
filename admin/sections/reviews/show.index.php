<?
$sql = 'SELECT * FROM reviews ORDER BY id';

$html = '';

foreach ($db->query($sql) as $row) {
    $html .= '<div class="panel panel-default js-approve-item js-edit-item" data-id="'.$row['id'].'" id="review-'.$row['id'].'">';
    $html .= '<div class="panel-heading">';
    $html .= '<a class="js-approve-button pull-right" href="#">';
    if ($row['approve'] == 0) {
	    $html .= 'Approve';
	} else {
	    $html .= 'Disprove';
	}
    $html .= '</a>';
    $html .= 'Author: '.$row['author'].' | Date: '.$row['date'].' | IP: ' .$row['ip'].' | Company: ' .$row['company'].' | Approve: ' .$row['approve'];
    $html .= '</div>';
    $html .= '<div class="panel-body js-edit-button">'.$row['message'].'</div>';
    $html .= '</div>';
}
if (!$html) {
    $html = 'Reviews not found.<br>';
}
?>

<?=$html?>
<br>
<div class="text-right">
	<a href="?do=add" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Add review</a>
</div>