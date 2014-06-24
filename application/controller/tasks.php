<?php
class Tasks extends Controller
{

    public function index()
    {
        $tasks_model = $this->loadModel('TasksModel');
   
        $tasks = $tasks_model->getAllTasks();

        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';
    }
    public function edit($id)
    {
        $tasks_model = $this->loadModel('TasksModel');
   
        $task = $tasks_model->getTask($id);

        require 'application/views/_templates/header.php';
        require 'application/views/tasks/edit.php';
        require 'application/views/_templates/footer.php';
    }

    public function addTask()
    {

        echo 'Message from Controller: You are in the Controller: TASK , using the method addTask().';

        if (isset($_POST["submit_add_task"])) {
            $tasks_model = $this->loadModel('TasksModel');
            $tasks_model->addTask($_POST["name"], $_POST["date"],  $_POST["advancement"]);
        }

        header('location: ' . URL . 'tasks/index');
    }

    public function deleteTask($task_id)
    {

        echo 'Message from Controller: You are in the Controller: Tasks, using the method deleteTask().';

        if (isset($task_id)) {
            $tasks_model = $this->loadModel('TasksModel');
            $tasks_model->deleteTask($task_id);
        }
        header('location: ' . URL . 'tasks/index');
    }
}
