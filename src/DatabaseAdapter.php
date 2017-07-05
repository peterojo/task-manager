<?php
/**
 * Created by PhpStorm.
 * User: peterojo
 * Date: 7/5/17
 * Time: 2:52 PM
 */

namespace Peterojo;

use PDO;

class DatabaseAdapter {
	
	protected $connection;
	
	function __construct (PDO $connection)
	{
		$this->connection = $connection;
	}
	
	/**
	 * @param $table
	 *
	 * @return array
	 */
	public function fetchAll ( $table ) {
		return $this->connection->query("SELECT * FROM {$table}")->fetchAll();
	}
	
	public function query ( $sql, $parameters ) {
		return $this->connection->prepare($sql)->execute($parameters);
	}
}