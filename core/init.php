<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 20/02/2015
 * Time: 12:38
 */


//	error_reporting(E_ALL^E_NOTICE);
	use core\classes\login;
	use core\classes\user;

	session_start();

	$host = "localhost";
	$database = "nieuws";
	$user_obj = "nieuws";
	$password = "mt5vDeAvaL4dnpqJ";

	$basePath = "http://localhost/loginsysteem/";

	if(!isset($_SESSION['flash'])) {
		$_SESSION['flash'] = '';

	}
	require('lib/FluentPDO/FluentPDO.php');
	require('connect.php');
	require('classes/user.php');
	require('classes/general.php');
	require('classes/login.php');


	$user_obj = new user($db, $basePath);
	$login_obj = new login($db, $basePath, $user_obj);