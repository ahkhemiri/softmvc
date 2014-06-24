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
        $sql = "SELECT t.id, t.name, t.date, t.advancement, r.name as resource_name FROM tasks t LEFT JOIN resource r ON r.id = t.resource_id";
        $query = $this->db->prepare($sql);
        $query->execute();
   
        return $query->fetchAll();
    }
	
	public function getAllTasksByResource($resource_id)
	{
	    $sql = "SELECT t.id, t.name, t.date, t.advancement, r.name as resource_name FROM tasks t LEFT JOIN resource r ON r.id = t.resource_id WHERE t.resource_id = :resource_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':resource_id'=>$resource_id));
   
        return $query->fetchAll();
	}
	
    public function getTask($task_id)
    {
        $sql = "SELECT * FROM tasks WHERE id = :task_id limit 1";
        $query = $this->db->prepare($sql);
        $query->execute(array(':task_id' => $task_id));
   
        return $query->fetch();
    }

    public function addTask($data)
    {
        $name = strip_tags($data['name']);
        $date = isset($data['date']) ? strip_tags($data['date']) : date('Y-m-d');
		$resource_id= strip_tags($data['resource_id']);
        $advancement = isset($data['advancement'])? strip_tags($data['advancement']) : 0;

        $sql = "INSERT INTO tasks (name, resource_id, date, advancement) VALUES (:name, :resource_id, :date, :advancement)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':date' => $date, ':resource_id' => $resource_id, ':advancement' => $advancement));
    }
	
    public function updateTask($data)
    {
	if(!isset($data['id']))
	return false;
        $name = strip_tags($data['name']);
        $date = isset($data['date']) ? strip_tags($data['date']) : date('Y-m-d');
		$resource_id= strip_tags($data['resource_id']);
        $advancement = isset($data['advancement'])? strip_tags($data['advancement']) : 0;

        $sql = "update tasks set name=:name, resource_id=:resource_id, date=:date, advancement=:advancement where id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':date' => $date, ':resource_id' => $resource_id, ':advancement' => $advancement, ':id'=>$data['id']));
    }

    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':task_id' => $task_id));
    }
}
