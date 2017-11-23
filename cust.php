<?php 
include_once 'panel/sistem.php';
$query = $db->query("SELECT * FROM ayar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$cahce = $row['cahce']; 
     } 
} 
if ($cahce == 1){
$filename = "%%-".md5($_SERVER['REQUEST_URI'])."-%%.html"; 
$cachefile = "cache/".$filename; 
////$cachetime = 60; 
if (file_exists($cachefile)) { 
if(time() - $cachetime < filemtime($cachefile)) { 
readfile($cachefile); 
exit; 
}else { 
unlink($cachefile); 
} } 
ob_start(); 
}
?>