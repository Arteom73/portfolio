<?include $_SERVER['DOCUMENT_ROOT'] . '/admin/header.php'?>
<?
$sections = array();

$dir = opendir('./sections/');

while($file = readdir($dir)) {
   if (is_dir('./sections/'.$file) && $file != '.' && $file != '..') {
       $sections[] = $file;
   }
}
?>
<div class="row">
<?foreach ($sections as $section) {?>
	
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="./sections/<?=$section?>/index.png" alt="<?=$section?>">
			<div class="caption">
				<h3><?=$section?></h3>
				<p>
					<a href="./<?=$section?>/" class="btn btn-primary" role="button">Go to <?=$section?></a>
				</p>
			</div>
		</div>
	</div>

<?}?>
</div>
<?include $_SERVER['DOCUMENT_ROOT'] . '/admin/footer.php'?>