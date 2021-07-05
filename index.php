<?php
require 'config/init.php';


$dbHandle = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);





//simple router
//TODO:

$route = str_replace('', "", $_SERVER['REQUEST_URI']);
$route = explode('/', $route);
var_dump($route);
var_dump($_SERVER['REQUEST_URI']);

switch ($route[2]) {

    case '':
    case 'index.php':
        $home = new HomeController();
        $home->showForm();
        break;
    case 'student':
        $student = new StudentController();

        if (isset($route[3]) && is_numeric($route[3]) ) {
            $student->showSingle($route[3]);
        }
        else {
            $student->notFound();

        }

        break;

    case'newstudent':
        $student = new StudentController();
        $student->addStudent();
        break;

    default:
        include 'Views/404.php';
        break;

}

