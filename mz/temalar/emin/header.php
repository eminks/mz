<?php include "cust.php" ?>
<base href="localhost/" />
<!DOCTYPE html>
<html lang="TR">

<?php 
include_once 'panel/sistem.php';

$query = $db->query("SELECT * FROM ayar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$title = $row['title']; 
$keyword = $row['keyword']; 
$aciklama = $row['aciklama']; 
$twitter = $row['twitter']; 
$github = $row['github']; 
$copyright = $row['copyright']; 
$image = $row['image']; 
$adres = $row['adres']; 

     } 
} 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $aciklama; ?>">
	<meta name="keywords" content="<?php echo $keyword; ?>">
    <meta name="author" content="Emin Köse">
	<meta name="robots" content="index,follow" />
	<meta name="generator" content="Ekpress" />
	
	
<meta itemprop="name" content="<?php echo $title; ?>">
<meta itemprop="description" content="<?php echo $aciklama; ?>">
<meta itemprop="image" content="<?php echo $image; ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@<?php echo $twitter; ?>">
<meta name="twitter:title" content="<?php echo $title; ?>">
<meta name="twitter:description" content="<?php echo $aciklama; ?>">
<meta name="twitter:creator" content="@<?php echo $twitter; ?>">
<meta name="twitter:image:src" content="<?php echo $image; ?>">

<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:url" content="http://<?php echo $adres; ?>" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:description" content="<?php echo $aciklama; ?>" />
<meta property="og:site_name" content="<?php echo $title; ?>" />
	
    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/mz/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/mz/css/clean-blog.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="http://<?php echo $adres; ?>"><?php echo $title; ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
				<?php 
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
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>