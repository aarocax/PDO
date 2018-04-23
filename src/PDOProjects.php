<?php

namespace PDO\src;

use PDO\src\PDODaoAdmin;
use PDO\src\Project;

class PDOProjects extends PDODaoAdmin
{
	
	protected $mock;

	public function __construct($mock = false) {
		parent::__construct();
	}

	public function getProjectByPid($pid = null) {
		$query = 'SELECT * FROM project where pid = :pid';
		$data = $this->executeSelect($query, 1, array(':pid' => $pid ), array(':pid' => 'INT'));
	
  	if ($this->checkResponse($data)) {
  		$project = new Project($data);
  		return $project;
  	}
  }

  public function getProjectByName($name = null) {
		$query = 'SELECT * FROM project where name = :name';
		$data = $this->executeSelect($query, 1, array(':name' => $name ), array(':name' => 'STR'));
	
  	if ($this->checkResponse($data)) {
  		$project = new Project($data);
  		return $project;
  	}
  }

  public function createProject(Project $project) {
  	
		$query = "INSERT INTO project (name) VALUES (:name)";
		$data = $this->executeInsert($query, 1, array(':name' => $project->getName() ), array(':name' => 'STR'));

  	return $data;
  }


}