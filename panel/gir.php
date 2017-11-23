<?php 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

include_once 'sistem.php';
		if ($_POST){   
		$ka = htmlentities(@$_POST["kadi"], ENT_QUOTES, 'UTF-8');
		$ksifrem = htmlentities($_POST["sifre"], ENT_QUOTES, 'UTF-8');
		$ksifre = sha1($ksifrem);
		if (!$kadi || !$sifre ){
		$query = $db->prepare("SELECT * FROM uyeler WHERE kadi=? and ksifi=?");
        $query->execute(array($ka, $ksifre));
		$islem = $query->fetch();
		if($islem){
			$_SESSION['kad'] = $islem['kadi'];
            $_SESSION['ksifre'] = $islem['ksifi'];
			$_SESSION['yetki'] = $islem['ytki'];
			header('location:panel.php');
         }else{
echo 'Hata var';
		 }
		}
		}
		?>
		
<!DOCTYPE html>
<html lang="tr">
  <head>
<title>EKPANEL</title>
<link href="assets/css/oz.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  </head>
<body>
		    <div class="container ">
         <div class="row  pad-top" style="margin-top:5%;">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Kayıt Ol</strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
            <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
            <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı adı" />
            </div>
            <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" name="sifre" class="form-control" placeholder="Şifre" />
            </div>
			<center>
            <input class="btn btn-success" type="submit" value="Giriş Yap">
            </center>
			<hr />
            Hesanınız yok mu ? <a href="kayit.php" >Buradan kayıt olun</a>
            </form>
        </div>
     </div>
</div>
</div>				
</body>
</html>		