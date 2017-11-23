<?php $id = htmlentities($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>

<div class="alert alert-dismissable alert-warning">
<h4>DİKKAT!</h4>
<p>GERÇEKTEN AMA GERÇEKTEN AMA GERÇEKTEN SİLMEK İSTİYORMUSUNUZ ?</p>
<form class="form-horizontal" method="POST">
  <input type="hidden" name="firstname" value="<?php echo $id; ?>">

        <button type="submit" class="btn btn-primary">EVET</button>
  </form>

  <?php
if ($_POST){
$query = $db->prepare("DELETE FROM uyeler WHERE id = :id");
$delete = $query->execute(array(
   'id' => $id
));
if ( $query ){
   echo '<div class="alert alert-dismissable alert-success">
<button type="button" class="close" data-dismiss="alert">X</button>
<strong>BAŞARILI!</strong>    İşlem Tamamlandı... :)
</div>
';
}else {
   echo '<div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">X</button>
<h4>HATA!</h4>
<p>Sorun var!</p>
</div>';
}
} 
?>
</div>