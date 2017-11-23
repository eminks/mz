<form action="" method="POST">
			  <fieldset>
				<legend>Yönetici Bilgilerini Düzenle</legend>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Kullanıcı Adı</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prad" value="<?php echo $knick; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Kullanıcı Şifresi</label>
				  <div class="col-lg-10">
					<input type="password" class="form-control" name="prsifre" value="<?php echo $prsifre; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Adınız</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="pradi" value="<?php echo $kadiniz; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Eposta Adresiniz</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prepos" value="<?php echo $kepostaniz; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Profil Resim</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prresim" value="<?php echo $presim; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					<button type="submit" class="btn btn-primary">Kaydet</button>
				  </div>
				</div>
			  </fieldset>
		</form>	
<?php
if ($_POST){
$yolad = htmlentities($_POST['prad'], ENT_QUOTES, 'UTF-8');
$yolsif = htmlentities($_POST["prsifre"], ENT_QUOTES, 'UTF-8');
$yolgad = htmlentities($_POST['pradi'], ENT_QUOTES, 'UTF-8');
$yolepos = htmlentities($_POST["prepos"], ENT_QUOTES, 'UTF-8');
$yolresim = htmlentities($_POST["prresim"], ENT_QUOTES, 'UTF-8');
$ksifre = sha1($yolsif);



/// update bölümü
if (!$yolad || !$yolsif){
print '<div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4>Warning!</h4>
<p>Boş alan bırakma!</p>
</div>';
    }else {
$query = $db->prepare("UPDATE uyeler SET kadi = ?, ksifi = ?, adi = ?, eposta = ?, resim = ? WHERE kadi = ?"); 

$insert = $query->execute(array( 
    "$yolad", "$ksifre", "$yolgad", "$yolepos", "$yolresim", "$knick"
)); 
if ( $insert ){
echo '<div class="alert alert-dismissable alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>BAŞARILI!</strong> Güncellendi :)
</div>';
}else {
   echo '<div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4>Warning!</h4>
<p>Güncellenemedi</p>
</div>';
}
}
}
?>