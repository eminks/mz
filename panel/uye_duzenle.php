<?php
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8'); 
$query = $db->query("SELECT * FROM uyeler WHERE id = '{$id}'", PDO::FETCH_ASSOC); 
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$kuladi = $row['kadi']; 
$kulyetki = $row['ytki']; 
$kulgad = $row['adi'];
$kulepos = $row['eposta']; 
$kulres = $row['resim']; 

     } 
} 
?>
	<div class="showback">
	<form class="form-horizontal" method="POST">
		  <fieldset>
			<legend>Üye Düzenle:</legend>
			<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Kullanıcı Adı</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prad" value="<?php echo $kuladi; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Kullanıcı Şifresi</label>
				  <div class="col-lg-10">
					<input type="password" class="form-control" name="prsifre" value="">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Kullanıcı Yetkisi</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prsifre" value="<?php echo $kulyetki; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Adınız</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="pradi" value="<?php echo $kulgad; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Eposta Adresiniz</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prepos" value="<?php echo $kulepos; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <label for="inputEmail" class="col-lg-2 control-label">Profil Resim</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" name="prresim" value="<?php echo $kulres; ?>">
				  </div>
				</div><br><br>
				<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					<button type="submit" class="btn btn-primary">Kaydet</button>
				  </div>
				</div>		
</fieldset>
</form>	
</div>
<?php 
if ($_POST){   
$yolad = htmlentities($_POST['prad'], ENT_QUOTES, 'UTF-8');
$yolsif = htmlentities($_POST["prsifre"], ENT_QUOTES, 'UTF-8');
$yolgad = htmlentities($_POST['pradi'], ENT_QUOTES, 'UTF-8');
$yolepos = htmlentities($_POST["prepos"], ENT_QUOTES, 'UTF-8');
$yolresim = htmlentities($_POST["prresim"], ENT_QUOTES, 'UTF-8');
$yolyetki = htmlentities($_POST["pryetki"], ENT_QUOTES, 'UTF-8');
$ksifre = sha1($yolsif);
                                
$query = $db->prepare("UPDATE uyeler SET kadi = ?, ksifi = ?, adi = ?, eposta = ?, resim = ? WHERE id = ?"); 
$insert = $query->execute(array( 
    "$yolad", "$ksifre", "$yolgad", "$yolepos", "$yolresim", "$id"
)); 
if ( $insert ){ 
    $last_id = $db->lastInsertId(); 
   print '<div class="alert alert-dismissable alert-success"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<strong>BAŞARILI!</strong> Düzenleme tamam :) 
</div>'; 
  
}else { 
   print '<div class="alert alert-dismissable alert-warning"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<h4>Warning!</h4><p>Hata var....</p></div>'; 
} 

} 
?>