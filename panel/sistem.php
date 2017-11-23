<?php
error_reporting(0);
header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');
 try {
     $db = new PDO("mysql:host=localhost;dbname=mz", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
 $db->query("SET CHARACTER SET uf8");
 
function kisalt($cumle, $karakter = 100){
	if(strlen($cumle) > $karakter){
        $sonuc = mb_substr($cumle, 0, $karakter, "UTF-8").'...';
    }else{
        $sonuc = $cumle;
    }
    return $sonuc;
}
function seo($s) {
 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
 $s = str_replace($tr,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}






$query = $db->query("SELECT * FROM ayar", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){ 
     foreach( $query as $row ){ 
$adres = $row['adres']; 

     } 
}
?>