<?php
	ini_set('defalt_charset', 'UTF-8');
	$con= new mysqli('localhost','root', '', 'gerencia_brinquedos');

	$con->query("SET NAMES utf8");
?>