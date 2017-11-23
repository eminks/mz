<?php
$id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8');
$query = $db->query("SELECT * FROM kategoriler WHERE id = '{$id}'", PDO::FETCH_ASSOC); 
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$katadi = $row['katadi']; 

 } 
} 
?>
<div class="showback">
      <form class="form-horizontal" method="POST" enctype="multipart/form-data">
		  <fieldset>
			<legend>Kategori Düzenle</legend>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Kategori Adı:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="katadi" value="<?php echo $katadi; ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Kategori resmi:</label>
			  <div class="col-lg-10">
			    <input type="file" class="form-control" name="dosya" />
			  </div>
			</div>
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
				$katimge2=$adres."/dosya/".$dosyaAdi;
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

$katadi2 = htmlentities($_POST['katadi'], ENT_QUOTES, 'UTF-8'); 
    if (!$katadi2){ 
print '<div class="alert alert-dismissable alert-warning"> 
<button type="button" class="close" data-dismiss="alert">×</button> 
<h4>Warning!</h4><p>Boş alan bırakma</p></div>'; 
    }else { 
                                
   $query = $db->prepare("UPDATE kategoriler SET 
katadi = ?,
katimge = ?
WHERE id=?
"); 
$insert = $query->execute(array( 
    "$katadi2", "$katimge2", "$id"
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