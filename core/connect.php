<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 20/02/2015
 * Time: 12:46
 */

	if(!defined('HOST')) define('HOST', $host);
	if(!defined('USER')) define('USER', $user_obj);
	if(!defined('PASSWORD')) define('PASSWORD', $password);
	if(!defined('DATABASE')) define('DATABASE', $database);

	$PDO = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);

	$PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$PDO->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

	$db = new FluentPDO($PDO);
