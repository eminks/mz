<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

include_once 'sistem.php';
?>
<?php 
		if ($_POST){ 
		$ka = htmlentities(@$_POST["kadil"], ENT_QUOTES, 'UTF-8');
		$ksifrem = htmlentities($_POST["sifre"], ENT_QUOTES, 'UTF-8');
		$ksifre = sha1($ksifrem);
	    $kad = htmlentities(@$_POST["ad"], ENT_QUOTES, 'UTF-8');
		$kmail = htmlentities(@$_POST["mail"], ENT_QUOTES, 'UTF-8');
		
		$query = $db->prepare("INSERT INTO uyeler SET
        kadi = ?, 
        ksifi = ?, 
        ytki = ?, 
		adi = ?, 
		eposta = ?
        ");
        $insert = $query->execute(array(
        "$ka", "$ksifre", "3", "$kad", "$kmail"
        ));
			header('location:index.php');
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
            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
            <input type="text" name="ad" class="form-control" placeholder="Adınız" />
            </div>
            <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
            <input type="text" name="kadil" class="form-control" placeholder="Kullanıcı adınız" />
            </div>
            <div class="form-group input-group">
            <span class="input-group-addon">@</span>
            <input type="text" name="mail" class="form-control" placeholder="Mail adresiniz" />
            </div>
            <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" name="sifre" class="form-control" placeholder="Şifreniz" />
            </div>
			<center>
            <input class="btn btn-success" type="submit" value="Kayıt OL">
            </center>
			<hr />
            Zaten bir hesabın var mı ? <a href="gir.php" >Buradan giriş yap</a>
            </form>
        </div>
     </div>
</div>
</div>				
</body>
</html>