<?php 
if ($cahce == 1){
$fp = fopen($cachefile, 'w+');  
fwrite($fp, ob_get_contents());  
fclose($fp);  
ob_end_flush();  
}
?>