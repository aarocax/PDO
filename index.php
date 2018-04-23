<?php

require __DIR__ . '/vendor/autoload.php';

include 'src/config/config-real.php';

use PDO\src\PDOProjects;
use PDO\src\Project;



$pdo_project = PDOProjects::getInstance();

$project = $pdo_project->getProjectByPid(10);
echo $project->getPid()."<br>";
echo $project->getName()."<br>";

$project = $pdo_project->getProjectByName('proyecto 2');
echo $project->getPid()."<br>";
echo $project->getName()."<br>";



// creo un nuevo proyecto
$data = array('name' => 'Programación');
$project = new Project();
$project->setName('Programaciónñqlwjqwlñdkj');
$project_id = $pdo_project->createProject($project);

echo $project_id;

