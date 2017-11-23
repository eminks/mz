
<?php require_once('header.php'); ?>

<?php
$Sayfa   = @intval(htmlentities($_GET['sayfa'], ENT_QUOTES, 'UTF-8')); if(!$Sayfa) $Sayfa = 1;
$Say   = $db->query("select * from yazilar order by id DESC");
$ToplamVeri   = $Say->rowCount();
$Limit	= 5;
$Sayfa_Sayisi	= ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster   = $Sayfa * $Limit - $Limit;
?>
<?php

$Makale	= $db->query("select * from yazilar WHERE yazi_durum = 1 order by id DESC limit $Goster,$Limit");

$MakaleAl = $Makale->fetchAll(PDO::FETCH_ASSOC);

foreach($MakaleAl as $MakaleBas){ ?>

<div class="guncel">
<a href="<?php echo $adres; ?>ok.php?id=<?=$MakaleBas['id']?>">
<h3> <?=$MakaleBas["yazi_ad"]?> </h3></a>
<p><img src="<?php echo $yazimg; ?>"/> <?php echo strip_tags(kisalt($MakaleBas["yazi"], 150)); ?>
</p>
</div>	
   <?php } ?>
   
<?php require_once('footer.php'); ?>