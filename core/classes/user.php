<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 20/03/2015
 * Time: 11:54
 */

namespace core\classes;


class user {
	protected $db;
	protected $basePath;

	/**
	 * @param \FluentPDO $db
	 */
	public function __construct(\FluentPDO $db)
	{
		$this->db = $db;
	}


	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function create(array $data)
	{
		try {
			$username = $data['username'];
			$salt = $data['salt'] = mcrypt_create_iv(128, MCRYPT_DEV_RANDOM);
			$data['password'] = hash('sha512', $data['password'] . $salt);
			$email = $data['email'];
			$data['email_code'] = md5($username.$email);
			$data['ip'] = $_SERVER['REMOTE_ADDR'];
			$data['time'] = time();
			$data['role'] = "user_obj";
			$query = $this->db->insertInto('users', $data);


			$query->execute();

			return true;
		}
		catch(\Exception $e)
		{
			$_SESSION['flash']['error'] = $e;
			return false;
		}

	}


	/**
	 * @param $username
	 *
	 * @return mixed
	 */
	public function findByUsername($username)
	{
		$query = $this->db->from('users')->where('username',$username);
		$data = $query->fetch();
		return $data;

	}

	/**
	 * @param $email
	 *
	 * @return mixed
	 */
	public function findByEmail($email)
	{
		$query = $this->db->from('users')->where('email',$email);
		$data = $query->fetch();
		return $data;
	}

}
