<?php

require "Model/DBConnection.php";
require "Model/TaskModel.php";
require "Model/TaskEntity.php";
require "Controller/TaskController.php";

use \Controller\TaskController;

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Todo List</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link href='lib/fullcalendar.min.css' rel='stylesheet' />
        <link href='lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='lib/moment.min.js'></script>
        <script src='lib/jquery.min.js'></script>
        <script src='lib/fullcalendar.min.js'></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">To Do List</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="index.php?page=add" >Create new task</a></li>
                    
                    <li><a href="index.php?page=cal" >Show Calendar</a> </li>
                </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>



        <div class="container" style="margin-top:25px">
            <?php
$controller = new \Controller\TaskController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;

switch ($page) {
    case 'add':
        $controller->add();
        break;
    case 'view':
        $controller->view();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'cal':
        $controller->cal();
        break;
    default:
        $controller->index();
        break;
}
?>
        </div>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </body>
</html>