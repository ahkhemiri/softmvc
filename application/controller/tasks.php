<?php
class Tasks extends Controller
{

    public function index($view = 'default')
    {
        $tasks_model = $this->loadModel('TasksModel');
		if(isset($_POST['filter']) && $_POST['filter'])
		$tasks = $tasks_model->getAllTasksByResource($_POST['resource_id']);
		else
        $tasks = $tasks_model->getAllTasks();
		//get resource dropdown list
		$resources_model = $this->loadModel('ResourceModel');
		$resources= $resources_model->getAllResources();

        require 'application/views/_templates/header.php';
		if($view == 'default')
        require 'application/views/tasks/index.php';
		else
		require 'application/views/tasks/'.$view.'.php';
        require 'application/views/_templates/footer.php';
    }
    public function edit($id)
    {
        $tasks_model = $this->loadModel('TasksModel');
		
		
		if(isset($_POST['name']))
		{
		$tasks_model->updateTask($_POST);
		$message=array('type'=>'','content'=>'Tache mis à jour avec succés');
		$this->index();
		}
		else
		{
		//get resource dropdown list
		$resources_model = $this->loadModel('ResourceModel');
		$resources= $resources_model->getAllResources();
        $task = $tasks_model->getTask($id);

        require 'application/views/_templates/header.php';
        require 'application/views/tasks/edit.php';
        require 'application/views/_templates/footer.php';
		}
    }

    public function addTask()
    {

        echo 'Message from Controller: You are in the Controller: TASK , using the method addTask().';

        if (isset($_POST["submit_add_task"])) {
            $tasks_model = $this->loadModel('TasksModel');
            $tasks_model->addTask($_POST);
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
