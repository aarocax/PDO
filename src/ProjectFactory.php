<?php

namespace PDO\src;

class ProjectFactory {

	public static function createProject($pid,$config) {
		$pdo_project = PDOProjects::getInstance();
		//return $project;
		if ($project = $pdo_project->getProject($pid)) {
			return $project;
		} else {
      return false;
    } 
		
	}
}