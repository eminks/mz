<?php
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
$tema = $row['adres'];
$cahce = $row['cahce'];
     }
}

?>
	<div class="showback">
<form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Site Ayarları</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Title</strong><br> {Site Başlığı}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="title" id="inputEmail" value="<?php echo $title; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label"><strong class="text-primary">Description</strong><br> {Site Açıklaması}</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="description" id="textArea"><?php echo $aciklama; ?></textarea>
        <span class="help-block">Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır..</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Keywords</strong><br> {Site Anahtar Kelimeler}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="keywords" id="inputEmail" value="<?php echo $keyword; ?>">
      </div>
    </div>	
	   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Twitter</strong><br> {Twitter adresiniz}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="twitter" id="inputEmail" value="<?php echo $twitter; ?>">
      </div>
    </div>	
	   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">GitHub</strong><br> {GitHub adresiniz}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="github" id="inputEmail" value="<?php echo $github; ?>">
      </div>
    </div>	
	   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">copyright</strong><br> {Site copyright}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="copyright" id="inputEmail" value="<?php echo $copyright; ?>">
      </div>
    </div>	
		   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Site resim</strong><br> {Site resiminiz}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="image2" id="inputEmail" value="<?php echo $image; ?>">
      </div>
    </div>	
		   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Site adres</strong><br> {Site adresiniz}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="adres2" id="inputEmail" value="<?php echo $adres; ?>">
      </div>
    </div>	
			   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Tema</strong><br> {Site Teması}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="tema" id="inputEmail" value="<?php echo $tema; ?>">
      </div>
    </div>
	<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label"><strong class="text-primary">Cahce</strong><br> {Site cahcesi -1 veya 0-}</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="scahce" id="inputEmail" value="<?php echo $cahce; ?>">
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

$title2 = htmlentities($_POST['title'], ENT_QUOTES, 'UTF-8');
$aciklama2 = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
$keywords2 = htmlentities($_POST['keywords'], ENT_QUOTES, 'UTF-8');
$twit = htmlentities($_POST['twitter'], ENT_QUOTES, 'UTF-8');
$gittub = htmlentities($_POST['github'], ENT_QUOTES, 'UTF-8');
$copiy = htmlentities($_POST['copyright'], ENT_QUOTES, 'UTF-8');
$image2 = htmlentities($_POST['image2'], ENT_QUOTES, 'UTF-8');
$adres2 = htmlentities($_POST['adres2'], ENT_QUOTES, 'UTF-8');
$tema2 = htmlentities($_POST['tema'], ENT_QUOTES, 'UTF-8');
$cahce2 = htmlentities($_POST['scahce'], ENT_QUOTES, 'UTF-8');
/// update bölümü

    if (!$title2 || !$aciklama2 || !$keywords2 || !$adres2){
     print '<div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4>Warning!</h4>
<p>Boş alan bırakma!</p>
</div>';
    }else {
$query = $db->prepare("UPDATE ayar SET 
title = ?,
keyword = ?,
aciklama = ?,
twitter = ?,
github = ?,
copyright = ?,
image = ?,
adres = ?,
tema = ?,
cahce = ?
"); 
$insert = $query->execute(array( 
    "$title2", "$keywords2", "$aciklama2", "$twit", "$gittub", "$copiy", "$image2", "$adres2", "$tema2", "$cahce2"
)); 
if ( $insert ){
echo '<div class="alert alert-dismissable alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>BAŞARILI!</strong> Yazı eklendi :)
</div>';
}else {
   echo '<div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4>Warning!</h4>
<p>Yazı eklenemedi...</p>
</div>';
}
}
}
?>
