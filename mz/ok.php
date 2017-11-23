<?php include "cust.php" ?>
<!DOCTYPE html>
<html lang="TR">
<?php 
include_once 'panel/sistem.php';
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8');
$query = $db->query("SELECT * FROM ayar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$twitter = $row['twitter']; 
$github = $row['github']; 
$copyright = $row['copyright']; 
$adres = $row['adres']; 
$title = $row['title']; 

     } 
}

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
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $minikus; ?>">
<meta name="keywords" content="<?php echo $yaz_etiket; ?>">
<meta name="author" content="Emin Köse">
<meta name="robots" content="index,follow" />
<meta itemprop="name" content="<?php yazad ?>">
<meta itemprop="description" content="<?php echo $minikus; ?>">
<meta itemprop="image" content="<?php echo $yazimg; ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@<?php echo $twitter; ?>">
<meta name="twitter:title" content="<?php echo $yazad; ?>">
<meta name="twitter:description" content="<?php echo $minikus; ?>">
<meta name="twitter:creator" content="@<?php echo $twitter; ?>">
<meta name="twitter:image:src" content="<?php echo $yazimg; ?>">
<meta property="og:title" content="<?php echo $yazad; ?>" />
<meta property="og:url" content="http://<?php echo $adres; ?>" />
<meta property="og:image" content="<?php echo $yazimg; ?>" />
<meta property="og:description" content="<?php echo $minikus; ?>" />
<meta property="og:site_name" content="<?php echo $yazad; ?>" />
    <title><?php echo $yazad; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $adres; ?>"><?php echo $title; ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
				<?php 
$query = $db->query("SELECT * FROM sayfalar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
?>				
	 <li><a href="<?php echo $adres; ?>say.php?id=<?php echo $row['id']; ?>"><?php echo $row['say_ad']; ?></a></li>
<?php
}
}
?>					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo $yazimg; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $yazad; ?></h1>
                        <h2 class="subheading"><?php echo $minikus; ?></h2>
                        <span class="meta">Yazan <a href="#">Emin Köse</a> <?php echo $tarih1[0]; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="word-wrap:break-word">
                  <?php echo $yazi; ?>
   
   
   
                </div>
            </div>
        </div>
    </article>
<hr>    
<?php require_once('footer.php'); ?>
