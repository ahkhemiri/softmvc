<?php

class ResourceModel
{

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllResources()
    {
        $sql = "SELECT * FROM resource";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
