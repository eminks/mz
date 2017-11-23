<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

include_once 'sistem.php';

session_start();
?><?php
$kadirsorgi = $_SESSION['kad'];
$query = $db->prepare("SELECT * FROM uyeler WHERE kadi= ?");
$query->execute(array($kadirsorgi));
$islem = $query->fetch();
if(!isset($islem['kadi']))
{
header("Location:index.html");
}else{
		if($islem){
			$knick = $islem['kadi'];
			$kyetkiniz = $islem['ytki'];
			$kadiniz = $islem['adi'];
			$kepostaniz = $islem['eposta'];
			$presim = $islem['resim'];
         }
}


$query = $db->query("SELECT * FROM ayar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){

$title = $row['title'];
$adres = $row['adres'];
     }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKpanel</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="panel.php" class="logo"><b>EKpanel</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="cik.php">ÇIKIŞ</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="<?php echo $presim; ?>" class="img-circle" width="60"></p>
              	  <h5 class="centered"><?php echo $kadiniz; ?></h5>
              	  	
                  <li class="mt">
                      <a href="panel.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Anasayfa</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="glyphicon glyphicon-edit"></i>
                          <span>Yazı</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="panel.php?sayfa=yazi_ekle">Yazı Ekle</a></li>
                          <li><a  href="panel.php?sayfa=yazi_listele">Yazı Listele</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="glyphicon glyphicon-folder-open"></i>
                          <span>Kategoriler</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="panel.php?sayfa=kat_ekle">Kategori Ekle</a></li>
                          <li><a  href="panel.php?sayfa=kat_listele">Kategorileri Listele</a></li>
                      </ul>
                  </li> 
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Sayfa</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="panel.php?sayfa=say_ekle">Sayfa Ekle</a></li>
                          <li><a  href="panel.php?sayfa=say_listele">Sayfa Listele</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="panel.php?sayfa=site_ayar">
                          <i class="glyphicon glyphicon-wrench"></i>
                          <span>Ayarlar</span>
                      </a>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="panel.php?sayfa=profil">
                          <i class="glyphicon glyphicon-user"></i>
                          <span>Üye İşlem</span>
                      </a>
					                        <ul class="sub">
						  <li><a  href="panel.php?sayfa=profil">Profil</a></li>
                          <li><a  href="panel.php?sayfa=uye_listele">Üye Listele</a></li>
                      </ul>

                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	  		 <section id="main-content">
          <section class="wrapper site-min-height">
		  <div class="col-lg-12">
		<?php 
			
			$sayfa = htmlentities($_GET["sayfa"], ENT_QUOTES, 'UTF-8');
			switch($sayfa){
								
				case "yazi_listele";
				include_once "yazi_listele.php";
				break;
				
				case "yazi_ekle";
				include_once "yazi_ekle.php";
				break;
				
				case "yazi_duzenle";
				include_once "yazi_duzenle.php";
				break;
				
				case "site_ayar";
				include_once "site_ayar.php";
				break;
				
				case "profil";
				include_once "profil.php";
				break;
				
				case "uye_duzenle";
				include_once "uye_duzenle.php";
				break;
				
				case "uye_listele";
				include_once "uye_listele.php";
				break;
				
				case "uyesil";
				include_once "uyesil.php";
				break;
				
				case "sil";
				include_once "sil.php";
				break;

                case "kat_listele";
				include_once "kat_listele.php";
				break;
				
				case "kat_ekle";
				include_once "kat_ekle.php";
				break;
				
				case "kat_duzenle";
				include_once "kat_duzenle.php";
				break;
			
				case "katsil";
				include_once "katsil.php";
				break;
                
				case "say_ekle";
				include_once "say_ekle.php";
				break;
				
				case "say_duzenle";
				include_once "say_duzenle.php";
				break;
			
				case "saysil";
				include_once "saysil.php";
				break;
 
                case "say_listele";
				include_once "say_listele.php";
				break;
			 }
?>
</div>
			</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();	  
	  });
  </script>

  </body>
</html>