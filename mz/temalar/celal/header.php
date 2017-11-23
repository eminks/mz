<?php 
include_once 'panel/sistem.php';
include_once 'fonk.php';
?>	
	
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="content-type" content="text/html charset=UTF-8" /> 
<link href="<?php echo $adres; ?>css/sitil.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="sayfa">
	<div id="logo"><img src="http://i.hizliresim.com/kn4Zg7.jpg"></div>

	<div id="menu">
	<ul>				<?php 
$query = $db->query("SELECT * FROM sayfalar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
?>				
	 <li><a href="say.php?id=<?php echo $row['id']; ?>"><?php echo $row['say_ad']; ?></a></li>
<?php
}
}
?>	
			</ul>	
		<div class="temizle"></div>
	</div>

	<div id="anasayfa">

		<div id="sol">
			<ul id="solmenu">
					<?php 
$query = $db->query("SELECT * FROM kategoriler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
?>				
	 <li><a href="kat.php?id=<?php echo $row['id']; ?>"><?php echo $row['katadi']; ?></a></li>
<?php
}
}
?>	
			</ul>
			<h3>Güncel Haberler</h3>
		<?php

$Makale	= $db->query("select * from yazilar WHERE yazi_durum = 1 order by id DESC limit 3");

$MakaleAl = $Makale->fetchAll(PDO::FETCH_ASSOC);

foreach($MakaleAl as $MakaleBas){ ?>
		
<div class="guncel">
<a href="http://localhost/mz/ok.php?id=<?=$MakaleBas['id']?>">
<h3> <?=$MakaleBas["yazi_ad"]?> </h3></a>
<p><img src="<?php echo $yazimg; ?>"/> <?php echo strip_tags(kisalt($MakaleBas["yazi"], 150)); ?>
</p>
</div>	
			
		   <?php } ?>	
		</div>
		
		<div id="yan">	