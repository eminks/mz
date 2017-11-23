<?php 
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8'); 
$query = $db->query("SELECT * FROM sayfalar WHERE id = '{$id}'", PDO::FETCH_ASSOC); 
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$say_ad = $row['say_ad']; 
$say = $row['say_icerik']; 
$etiket = $row['say_etiket']; 

     } 
} 
?>
<div class="showback">
<form class="form-horizontal" method="POST">
		  <fieldset>
			<legend>Sayfa Ekle:</legend>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Sayfa Adı:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="sayad" value="<?php echo $say_ad; ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Sayfa Resmi:</label>
			  <div class="col-lg-10">
			    <input type="file" class="form-control" name="dosya" />
			  </div>
			</div>

			 <div class="form-group">
			  <label for="textArea" class="col-lg-2 control-label">Sayfa:</label>
			  <div class="col-lg-10">
			  	<textarea class="ckeditor" rows="3" name="sayicerik"><?php echo $say; ?></textarea>
			  </div>
			</div>		
           <div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Sayfa Etiket::</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="etiket" value="<?php echo $etiket; ?>">
			  </div>
			</div>			
			<div class="form-group">
			  <div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">Ekle</button>
			  </div>
			</div>			
		  </fieldset>
		</form>	
		</div>

<?php 
if ($_POST){   
$sayadi = htmlentities($_POST['sayad'], ENT_QUOTES, 'UTF-8'); 
$sayicerik = $_POST['sayicerik']; 
$sayetiket = htmlentities($_POST['etiket'], ENT_QUOTES, 'UTF-8'); 


/// RESİM EKLEME
$maxBoyut= 10240;
$dosyaUzantisi =substr($_FILES["dosya"]["name"],-4,4);
$dosyaAdi =rand(0,999999999).$dosyaUzantisi;
$dosyaYolu = "../dosya/".$dosyaAdi;

if($_FILES["dosya"]["size"] < $maxBoyut) {
	echo "Dosya çok büyük";
}else {
	$d =substr($_FILES["dosya"]["name"],-4,4);
if($d != "jpg" && $d != "png" && $d != "jpeg" && $d != "gif" ) {
		
		if (is_uploaded_file($_FILES["dosya"]["tmp_name"])){
			$tasi = move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaYolu);
			if (tasi){
				$sayresim=$adres."/dosya/".$dosyaAdi;
			}else {
				echo'<div class="alert alert-dismissable alert-warning">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4>Warning!</h4><p>Dosya taşınırken hata oluştu.</p>
				</div>';
			}
		}else {			
			echo'<div class="alert alert-dismissable alert-warning">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4>Warning!</h4><p>Dosya yüklenirken sorun oldu</p>
				</div>';
		}
		
	}else {		
		echo'<div class="alert alert-dismissable alert-warning">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4>Warning!</h4><p>Dosya formatı :Jpg yada Png en olmadı Gif olmalı</p>
				</div>';
		
	}
}





    if (!$sayadi || !$sayicerik || !$sayetiket){ 
print '<div class="alert alert-dismissable alert-warning"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<h4>Warning!</h4><p>Boş alan bırakma</p></div>'; 
    }else { 
                                
   $query = $db->prepare("UPDATE sayfalar SET 
say_ad = ?, 
say_resim = ?, 
say_icerik = ?,
say_etiket = ?
WHERE id=?
"); 
$insert = $query->execute(array( 
    "$sayadi", "$sayresim", "$sayicerik", "$sayetiket", "$id"
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
} 
?>