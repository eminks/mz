<?php 
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8'); 
$query = $db->query("SELECT * FROM yazilar WHERE id = '{$id}'", PDO::FETCH_ASSOC); 
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$title = $row['yazi_ad']; 
$yzresim = $row['yazi_resim']; 
$yz = $row['yazi']; 
$yzetiket = $row['yazi_etiket']; 
$yzdurum = $row['yazi_durum']; 
$kat = $row['Kat']; 
$minikkus = $row['minikus']; 
 } 
} 
?>
	<div class="showback">
<form class="form-horizontal" method="POST">
		  <fieldset>
			<legend>Yazı Düzenle:</legend>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Yazı Adı:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="yaziadi" value="<?php echo $title; ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Yazı Resmi:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="yaziresim" value="<?php echo $yzresim; ?>">
			  </div>
			</div>
             <div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Mini Yazı:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="minikus23" value="<?php echo $minikkus; ?>">
			  </div>
			</div>
			 <div class="form-group">
			  <label for="textArea" class="col-lg-2 control-label">Yazı:</label>
			  <div class="col-lg-10">
				<textarea class="ckeditor" rows="3" name="yaiicerik" id="textArea"><?php echo $yz; ?></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Etiket:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="etiket" value="<?php echo $yzetiket; ?>">
			  </div>
			</div>			
            <div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Durum:</label>
			  <div class="col-lg-10">
			  <select name="durum">
              <option value="1">Yayınla</option>
              <option value="2">Taslak</option>
              </select>
			  </div>
			</div>	
            <div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Kategori:</label>
			  <div class="col-lg-10">
			  <select name="kategori">
<?php
$query = $db->query("SELECT * FROM kategoriler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){

    if($row["id"] == $kat)
    {
	 echo  "<option selected='selected' value='".$row["id"]."'>".$row["katadi"]."</option>";
    }
    else
    {
	 echo  "<option value='".$row["id"]."'>".$row["katadi"]."</option>";
    }
}
}
?>
</select>
</div>
</div>				
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button type="submit" class="btn btn-primary">Tamamla</button>
</div>
</div>			
</fieldset>
</form>	
</div>
<?php 
if ($_POST){   
$yaziadi = htmlentities($_POST['yaziadi'], ENT_QUOTES, 'UTF-8'); 
$yaziresim = htmlentities($_POST['yaziresim'], ENT_QUOTES, 'UTF-8'); 
$yaiicerik = $_POST['yaiicerik']; 
$etiket = htmlentities($_POST['etiket'], ENT_QUOTES, 'UTF-8'); 
$durum = htmlentities($_POST['durum'], ENT_QUOTES, 'UTF-8'); 
$kategori = htmlentities($_POST['kategori'], ENT_QUOTES, 'UTF-8');
$minikkus1 = htmlentities($_POST['minikus23'], ENT_QUOTES, 'UTF-8');

    if (!$yaziadi || !$yaziresim || !$yaiicerik || !$etiket || !$durum || !$kategori){ 
print '<div class="alert alert-dismissable alert-warning"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<h4>Warning!</h4><p>Boş alan bırakma</p></div>'; 
    }else { 
  
$query = $db->prepare("UPDATE yazilar SET 
yazi_ad = ?, 
yazi_resim = ?, 
yazi = ?, 
yazi_etiket = ?, 
yazi_durum = ? ,
kat = ?,
minikus = ?
WHERE id=?
"); 
$insert = $query->execute(array( 
    "$yaziadi", "$yaziresim", "$yaiicerik", "$etiket", "$durum", "$kategori", "$minikkus1", "$id"
)); 
if ( $insert ){ 
    $last_id = $db->lastInsertId(); 
   print '<div class="alert alert-dismissable alert-success"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<strong>BAŞARILI!</strong> Yazı eklendi :) 
</div>'; 
}else { 
   print '<div class="alert alert-dismissable alert-warning"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<h4>Warning!</h4><p>Yazı eklenemedi...</p></div>'; 
} 
} 
} 
?>