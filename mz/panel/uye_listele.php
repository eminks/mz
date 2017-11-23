<table class="table table-striped table-hover ">
<tbody> 
<?php 
$query = $db->query("SELECT * FROM uyeler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
?>
<tr class="success">
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['kadi']; ?></td>
<td><?php echo $row['ytki']; ?></td>
<td><?php echo $row['adi']; ?></td>
<td><?php echo $row['eposta']; ?></td>
<td align="left">
<div class="btn-group">
<button type="button" class="btn btn-theme04 dropdown-toggle" data-toggle="dropdown">
İşlem <span class="caret"></span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
<li><a href="panel.php?sayfa=uye_duzenle&id=<?php echo $row['id']; ?>">Düzenle</a></li>
<li><a href="panel.php?sayfa=uyesil&id=<?php echo $row['id']; ?>">Sil</a></li>
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