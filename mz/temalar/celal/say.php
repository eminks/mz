<?php require_once('header.php'); ?>
<?php
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8');

$query = $db->query("SELECT * FROM sayfalar WHERE id = '{$id}'", PDO::FETCH_ASSOC); 
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$yazad = $row['say_ad'];
$yazimg = $row['say_resim'];
$minikus = $row['minikyaz'];
$yazi = $row['say_icerik'];
$yaz_etiket = $row['etikit'];
 } 
} 
?>
<img src="<?php echo $yazimg; ?>" width="100%" height="200" />
		<?php echo $yazi; ?>
			<div class="temizle"></div>
			
<?php require_once('footer.php'); ?>