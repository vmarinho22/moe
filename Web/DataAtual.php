<?php 
header('Content-Type: text/html; charset=utf-8');

setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d');
echo '<p>'. utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date))). '</p>';

?>