<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 01/04/2015
 * Time: 14:36
 */

	require_once("core/init.php");

	$login_obj->logOut();
	header("location:".$basePath);
