<?php
	//Configurações de datas do PHP
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Fortaleza');

	//ini_set('error_reporting', 'E_STRICT');
	require_once "../config/config.php";
	require_once "../vendor/autoload.php";

	$route = new \App\Route;
	

?>