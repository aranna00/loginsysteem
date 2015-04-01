<?php
	/**
 * Created by PhpStorm.
 * User: aran
 * Date: 20/03/2015
 * Time: 12:28
 */


namespace core\classes;

use core\classes\user;

class Login {
	/**
	 * @param \FluentPDO $db
	 * @param string     $basePath
	 */
	public function __construct(\FluentPDO $db, $basePath = "http://localhost/nieuws/", user $user_obj)
	{
		if(!isset($user)){
			$this->_user = new user($db);
		}
		$this->db = $db;
		$this->basePath = $basePath;
		$this->user_obj = $user_obj;
	}

	/**
	 * @param array $data
	 */
	public function register(array $data)
	{
		if($data['username']==''){
			$_SESSION['flash']['username'] = "Please enter a username";
			$redirect = 1;
		}
		if($data['password']==''){
			$_SESSION['flash']['password'] = "Please enter a password";
			$redirect = 1;
		}
		if($data['confirm_password']==''||$_POST['confirm_password']!==$_POST['password']){
			$_SESSION['flash']['confirm_password'] = "Please confirm your password";
			$redirect = 1;
		}
		if($data['email']==''){
			$_SESSION['flash']['email'] = "please enter a email";
			$redirect = 1;
		}

		if(isset($redirect)){
			header("location:".$this->basePath."register.php");
		}
		else {

			unset($data['confirm_password']);
			$emailCheck = $this->checkEmail($data['email']);
			$usernameCheck = $this->checkUsername($data['username']);

			if ($emailCheck) {
				$_SESSION['flash']['email'] = 'Email in gebruik';
				header("location:" . $this->basePath . "register.php");
			}
			if ($usernameCheck) {
				$_SESSION['flash']['username'] = 'Username in gebruik';
				header("location:" . $this->basePath . "register.php");
			}


			if ($this->_user->create($data)) {
				$_SESSION['flash']['notice'] = "An account has been created";
				header('location:' . $this->basePath);
			} else {
				$_SESSION['flash']['warning'] = "Error 001: Something has gone wrong, please inform an admin";
				header('location:' . $this->basePath . 'register.php');
			}

		}
	}

	/**
	 * @param $email
	 *
	 * @return bool
	 */
	public function checkEmail($email)
	{
		$data = $this->user_obj->findByEmail($email);
		if($data===false)
		{
			$return = false;
		}
		else{
			$return = true;
		}
		return $return;
	}


	/**
	 * @param $username
	 *
	 * @return bool
	 */
	public function checkUsername($username)
	{
		$data = $this->user_obj->findByUsername($username);
		if($data===false)
		{
			$return = false;
		}
		else{
			$return = true;
		}
		return $return;
	}


	/**
	 * @param $username
	 * @param $password
	 */
	public function login($username,$password)
	{
		$user = $this->user_obj->findByUsername($username);

		if($user===false){
			$_SESSION['flash']['error'] = "the username or password is incorrect";
			header('location: '.$this->basePath."login.php");
		}
		elseif($user->password===hash('sha512',$password.$user->salt ))
		{
			$_SESSION['user']=$user;
			$_SESSION['flash']['notice'] = "You are logged in as ".$user->username.".";
			header('location:'.$this->basePath);
		}
		else
		{
			$_SESSION['flash']['error'] = "the username or password is incorrect";
			header('location: '.$this->basePath."login.php");
		}

	}

	/**
	 * @return bool
	 */
	public function loggedIn(){
		return(isset($_SESSION["user"])) ? true:false;
	}
}
