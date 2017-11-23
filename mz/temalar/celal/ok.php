<?php require_once('header.php'); ?>
<?php 
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8');
$query = $db->query("SELECT * FROM yazilar WHERE id = '{$id}'", PDO::FETCH_ASSOC); 
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$yazad = $row['yazi_ad'];
$yazimg = $row['yazi_resim'];
$minikus = $row['minikus'];
$yazi = $row['yazi'];
$yaz_etiket = $row['yazi_etiket'];
$tarih1 = explode (' ',$row['tarih']);
 } 
} 
?>
<img src="<?php echo $yazimg; ?>" width="100%" height="200" />
		<?php echo $yazi; ?>
			<div class="temizle"></div>
			
<?php require_once('footer.php'); ?>