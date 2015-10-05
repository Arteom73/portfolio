<?include $_SERVER['DOCUMENT_ROOT'] . '/admin/header.php'?>

<?
	$do = $_REQUEST['do'];

	switch ($do) {
		case 'add':
			include('./show.add.php');
			break;
		
		default:
			include('./show.index.php');
			break;
	}
?>
<?include $_SERVER['DOCUMENT_ROOT'] . '/admin/footer.php'?>