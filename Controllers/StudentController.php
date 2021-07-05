<?php

require_once 'Models'.DIRECTORY_SEPARATOR.'Student.php';

class StudentController
{

    public $id;

    public function __construct()
    {



    }


    public function showSingle($id)
    {

        var_dump($id);
        $student = new Student($id);
        $student->getById(1);

        $x= 'test';
        include 'Views/students.php';

    }


    public function notFound()
    {
        header('Content-Type: application/json');
        echo json_encode(["message:" => "Niste uneli id studenta"]);
    }

    public function addStudent()
    {
        var_dump($_POST);
    }

}