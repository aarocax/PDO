<?php

namespace PDO\src;

use PDO\src\PDODaoException;

$pdo = new PDODaoException('hola...');

class PDODaoAdmin
{
	private $_pdo;
	private $_pdoStatement;

	private $host = HOST;
	private $user = USER;
	private $password = PASSWORD;
	private $dbname = DBNAME;

	protected $test;

	public static function getInstance()
  {
    static $instance = null;

    if (null === $instance) {
      $instance = new static();
    }
    return $instance;
  }

  protected function __construct()
  {
  	try {
			$this->_pdo = new \PDO(
				"mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8mb4",
				$this->user,
				$this->password,
				array(
		      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
		      \PDO::ATTR_PERSISTENT => false
		    )
			);
		} catch (\PDOException $e) {
		  throw new PDODaoException($e, 5);
		}
  }

  private function __clone() { }
  private function __wakeup() { }

  public function executeSelect($query = '', $return_rows = 0, $array_values = array(), $array_types = array())
  {
  	try {
			$this->_pdoStatement = $this->_pdo->prepare($query);

			foreach ($array_values as $position => &$value) {
				$var_type = 'STR' == $array_types[$position] ? \PDO::PARAM_STR : \PDO::PARAM_INT;
				$this->_pdoStatement->bindParam($position, $value, $var_type);
			}
			
			$result = $this->_pdoStatement->execute();

			

			//var_dump($this->_pdo->lastInsertId()); 

			if (0 < $return_rows && $result) {
				return $return_rows == 1 ? $this->_pdoStatement->fetch(\PDO::FETCH_OBJ) : $this->_pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
			}
		} catch (Exception $e) {
		 	print "Error al ejecutar la sentencia sql...";
		 	throw new PDODaoException($e, 5);
		}
  }

  public function executeInsert($query = '', $return_rows = 0, $array_values = array(), $array_types = array())
  {
  	try {
			$this->_pdoStatement = $this->_pdo->prepare($query);

			foreach ($array_values as $position => &$value) {
				$var_type = 'STR' == $array_types[$position] ? \PDO::PARAM_STR : \PDO::PARAM_INT;
				$this->_pdoStatement->bindParam($position, $value, $var_type);
			}
			
			$result = $this->_pdoStatement->execute();

			return $this->_pdo->lastInsertId(); 

			
		} catch (Exception $e) {
		 	print "Error al ejecutar la sentencia sql...";
		}
  }

  public function checkResponse($response)
  {
  	if ($response) {
    	return true;
  	}
  }

  public function getError()
  {
    return $this->error;
  }


}