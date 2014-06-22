<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Tasks extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Songs, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $tasks_model = $this->loadModel('TasksModel');
   
        $tasks = $tasks_model->getAllTasks();

        // load another model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        //$resources_model = $this->loadModel('ResourceModel');
        //$amount_of_songs = $stats_model->getAmountOfSongs();

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addTask()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Songs, using the method addTask().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_task"])) {
            // load model, perform an action on the model
            $tasks_model = $this->loadModel('TasksModel');
            $tasks_model->addTask($_POST["name"], $_POST["date"],  $_POST["advancement"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'tasks/index');
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/songs/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $song_id Id of the to-delete song
     */
    public function deleteTask($task_id)
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Songs, using the method deleteTask().';

        // if we have an id of a song that should be deleted
        if (isset($task_id)) {
            // load model, perform an action on the model
            $tasks_model = $this->loadModel('TasksModel');
            $tasks_model->deleteTask($task_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'tasks/index');
    }
}
