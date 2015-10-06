<?
	
	if(isset($_POST['review_add'])) {

		if(!(empty($_POST['author']) && empty($_POST['message']))) {

			$author = htmlspecialchars($_POST['author']);
			$company = htmlspecialchars($_POST['company']);
			$email = htmlspecialchars($_POST['email']);
			$phone = htmlspecialchars($_POST['phone']);
			$date = date('l jS \of F Y h:i:s A');
			$ip = $_SERVER['REMOTE_ADDR'];
			$message = htmlspecialchars($_POST['message']);

			$sql = $db->prepare("INSERT INTO reviews(author, message, company, email, phone, date, ip) VALUES (:author, :message, :company, :email, :phone, :date, :ip)");
			$sql->bindParam(':author', $author);
			$sql->bindParam(':message', $message);
			$sql->bindParam(':company', $company);
			$sql->bindParam(':email', $email);
			$sql->bindParam(':phone', $phone);
			$sql->bindParam(':date', $date);
			$sql->bindParam(':ip', $ip);
			if ($sql->execute()) {
				$add_error = 'Review added';
			} else {
				$add_error = "Error!";
			}
			
			

		} else {

			$add_error = "Error!";

		}

	}

?>

<h1>Add review</h1>
<br>
<?if($add_error):?>
<div class="alert alert-danger" role="alert"><?=$add_error?></div>
<?endif;?>
<form action="?do=add" method="post">
<div class="row">
	<div class="col-lg-6">
		<div class="input-group">
			<span class="input-group-addon">Author</span>
			<input type="text" class="form-control" name="author">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="input-group">
			<span class="input-group-addon">Company</span>
			<input type="text" class="form-control" name="company">
		</div>
	</div>
</div>
<br>
<div class="input-group">
	<span class="input-group-addon">Text</span>
	<textarea class="form-control" name="message"></textarea>
</div>
<br>
<div class="text-right">
	<div class="btn-group">
	  <button class="btn btn-default" name="review_add">
	    <i class="glyphicon glyphicon-pencil"></i> Add
	  </button>
	</div>
</div>
</form>