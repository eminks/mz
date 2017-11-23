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

     } 
} 









?>