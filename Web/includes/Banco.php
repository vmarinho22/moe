<?php

$host ="bancotcc.mysql.dbaas.com.br";
$usuarioMysql="bancotcc";
$senha="vinicius14";
$base="bancotcc";

$con= mysql_connect($host,$usuarioMysql,$senha);

if(!$con){
	die('Não conectou: '.mysql_error());
}

mysql_select_db($base);

?>