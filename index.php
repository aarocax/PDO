<?php

require __DIR__ . '/vendor/autoload.php';



// $dsn = 'mysql:dbname=test;host=127.0.0.1';
// $user = 'googleguy';
// $password = 'googleguy';

// /*
//     Using try/catch around the constructor is still valid even though we set the ERRMODE to WARNING since
//     PDO::__construct will always throw a PDOException if the connection fails.
// */
// try {
//     $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
//     exit;
// }

// // This will cause PDO to throw an error of level E_WARNING instead of an exception (when the table doesn't exist)
// $dbh->query("SELECT wrongcolumn FROM wrongtable");


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



// creo un nnuevo proyecto
$data = array('name' => 'Programación');
$project = new Project();
$project->setName('Programaciónñqlwjqwlñdkj');
$project_id = $pdo_project->createProject($project);

var_dump($project_id);

