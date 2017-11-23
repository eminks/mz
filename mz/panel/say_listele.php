<table class="table table-striped table-hover ">
<tbody> 
<?php 
$query = $db->query("SELECT * FROM sayfalar order by id DESC", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
?>
<tr class="success">
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['say_ad']; ?></td>
<td align="left">
<div class="btn-group">
<button type="button" class="btn btn-theme04 dropdown-toggle" data-toggle="dropdown">
İşlem <span class="caret"></span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
<li><a href="panel.php?sayfa=say_duzenle&id=<?php echo $row['id']; ?>">Düzenle</a></li>
<li><a href="panel.php?sayfa=saysil&id=<?php echo $row['id']; ?>">Sil</a></li>
</ul>
</div>
</td>
</tr>
<?php
}
}
?>
</tbody>
</table> 