<?php

class TasksModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllTasks()
    {
        $sql = "SELECT id, name, date, advancement FROM tasks";
        $query = $this->db->prepare($sql);
        $query->execute();
   
        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addTask($name, $date, $advancement)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $date = strip_tags($date);
        $advancement = strip_tags($advancement);

        $sql = "INSERT INTO tasks (name, date, advancement) VALUES (:name, :date, :advancement)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':date' => $date, ':advancement' => $advancement));
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':task_id' => $task_id));
    }
}
