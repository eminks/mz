
<?php require_once('header.php'); ?>

<?php
$Sayfa   = @intval(htmlentities($_GET['sayfa'], ENT_QUOTES, 'UTF-8')); if(!$Sayfa) $Sayfa = 1;
$Say   = $db->query("select * from yazilar order by id DESC");
$ToplamVeri   = $Say->rowCount();
$Limit	= 10;
$Sayfa_Sayisi	= ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster   = $Sayfa * $Limit - $Limit;
?>



<!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo $image; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                    </div>
                </div>
            </div>
        </div>
    </header>
	
       <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="word-wrap:break-word">
			<?php

$Makale	= $db->query("select * from yazilar WHERE yazi_durum = 1 order by id DESC limit $Goster,$Limit");

$MakaleAl = $Makale->fetchAll(PDO::FETCH_ASSOC);

foreach($MakaleAl as $MakaleBas){ ?>
<?php 
$tarih1 = explode (' ',$MakaleBas['tarih']);


?>
<div class="post-preview">
                    <a href="http://localhost/mz/ok.php?id=<?=$MakaleBas['id']?>">
                        <h2 class="post-title">
                            <?=$MakaleBas["yazi_ad"]?>
                        </h2></a>
                        <p class="post-subtitle">
 <?php echo strip_tags(kisalt($MakaleBas["yazi"], 150)); ?>					
                        </p>
                    <p class="post-meta">Yazan: <a href="#">Emin Köse</a> <?php echo $tarih1[0]; ?>
					
					</p>
                </div>
                <hr>
   <?php } ?>
				
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="http://localhost/mz/index.php?sayfa=<?=$Sayfa + 1?>">Önceki yazılar &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>