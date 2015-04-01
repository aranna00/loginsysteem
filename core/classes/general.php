<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 27/03/2015
 * Time: 09:20
 */

namespace core\classes;


class general {
	/**
	 * @param \FluentPDO $db
	 * @param string     $basePath
	 */
	public function __construct(\FluentPDO $db, $basePath = "http://localhost/nieuws/")
	{
		$this->db = $db;
		$this->basePath = $basePath;
	}

}
