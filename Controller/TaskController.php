<?php

namespace Controller;

use \Model\DBConnection;
use \Model\TaskModel;
use \Model\TaskEntity;

class TaskController
{
    public $taskModel;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=todolist", "root", "root");
        $this->taskModel = new TaskModel($connection->connect());
    }
    public function index()
    {
        $tasks = $this->taskModel->getAllTask();
        include 'View/list.php';
    }
    public function cal()
    {
        $tasks = $this->taskModel->getAll();
        include 'View/showCalendal.php';
    }
    public function edit()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $task = $this->taskModel->getTask($id);
            include 'View/edit.php';
        } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id         = $_POST['id'];
            $title      = $_POST['title'];
            $start      = $_POST['start'];
            $end        = $_POST['end']; 
            $status     = $_POST['status'];
            $task       = new TaskEntity($title, $start, $end, $status);
            $this->taskModel->editTask($id, $task);
            header('Location: index.php');
        }
        else{
            die('error');
        }
    }
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'View/add.php';
        } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title       = $_POST['title'];
            $start  = $_POST['start'];
            $end    = $_POST['end']; 
            $status     = $_POST['status'];
            $task       = new TaskEntity($title, $start, $end, $status);
            $this->taskModel->createTask($task);
            header('Location: index.php');
        }
        else{
            die('error');
        }
    }
    public function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $task = $this->taskModel->getTask($id);
            include 'View/delete.php';
        } else {
            $id = $_POST['id'];
            $this->taskModel->deleteTask($id);
            header('Location: index.php');
        }
    }
}
