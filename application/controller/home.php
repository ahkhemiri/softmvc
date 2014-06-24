<?php

/**
 * Class Home
 */
class Home extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // debug message to show where you are, just for the demo
        echo 'Message from Controller: You are in the controller home, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }


    public function listTasks()
    {
        require 'application/views/_templates/header.php';
        require 'application/views/tasks/index.php';
        require 'application/views/_templates/footer.php';
    }

}
