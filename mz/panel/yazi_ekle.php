<?php
if ($_POST){
/// VERİLERİ ÇEKME KISMI
$yaziadi = htmlentities($_POST['yaziadi'], ENT_QUOTES, 'UTF-8');
$yaiicerik = $_POST['yaiicerik'];
$etiket = htmlentities($_POST['etiket'], ENT_QUOTES, 'UTF-8');
$durum = htmlentities($_POST['durum'], ENT_QUOTES, 'UTF-8');
$kategori = htmlentities($_POST['kategori'], ENT_QUOTES, 'UTF-8');
$minikkus = htmlentities($_POST['minikkus'], ENT_QUOTES, 'UTF-8');

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
				$yaziresim=$adres."/dosya/".$dosyaAdi;
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

/// VERİLERİ VERİ TABANINA YAZDIRMA

if (!$yaziadi || !$yaziresim || !$yaiicerik || !$etiket || !$durum){
print '<div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4>Warning!</h4><p>Boş alan bırakma</p>
</div>';
    }else {
$query = $db->prepare("INSERT INTO yazilar SET
yazi_ad = ?,
yazi_resim = ?,
yazi = ?,
yazi_etiket = ?,
yazi_durum = ?,
kat = ?,
minikus = ?
");
$insert = $query->execute(array(
    "$yaziadi", "$yaziresim", "$yaiicerik", "$etiket", "$durum", "$kategori", "$minikkus"
));
if ( $insert ){
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
	<div class="showback">
		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
		  <fieldset>
			<legend>Yazı Ekle</legend>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Yazı Adı:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="yaziadi" >
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Yazı Resmi:</label>
			  <div class="col-lg-10">
			    <input type="file" class="form-control" name="dosya" />
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Mini Yazı:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="minikkus" >
			  </div>
			</div>
			 <div class="form-group">
			  <label for="textArea" class="col-lg-2 control-label">Yazı:</label>
			  <div class="col-lg-10">
				<textarea class="ckeditor" rows="3" name="yaiicerik" id="textArea"></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Etiket:</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" name="etiket" placeholder="Etiketleri aralarında virgül olacak şekilde yazınız">
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

	 echo  "<option value='".$row["id"]."'>".$row["katadi"]."</option>";
	
	}
}

?>
       </select>
			  </div>
			</div>				
			<div class="form-group">
			  <div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">Yazı Ekle</button>
			  </div>
			</div>			
		  </fieldset>
		</form>	
		</div>	