<?php

class TasksModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllTasks()
    {
        $sql = "SELECT id, name, date, advancement FROM tasks";
        $query = $this->db->prepare($sql);
        $query->execute();
   
        return $query->fetchAll();
    }
	
    public function getTask($task_id)
    {
        $sql = "SELECT * FROM tasks WHERE id = :task_id limit 1";
        $query = $this->db->prepare($sql);
        $query->execute(array(':task_id' => $task_id));
   
        return $query->fetch();
    }

    public function addTask($name, $date, $advancement)
    {
        $name = strip_tags($name);
        $date = strip_tags($date);
        $advancement = strip_tags($advancement);

        $sql = "INSERT INTO tasks (name, date, advancement) VALUES (:name, :date, :advancement)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':date' => $date, ':advancement' => $advancement));
    }

    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':task_id' => $task_id));
    }
}
