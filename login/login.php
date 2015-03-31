<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 31/03/2015
 * Time: 13:09
 */

require_once('../core/init.php');

	$login_obj->login($_POST['username'],$_POST['password']);
