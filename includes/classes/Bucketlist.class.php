<?php

class Bucketlist {
    //Properties
    private $db;
    private $name;
    private $description;
    private $priority;

    //Constructor
    function __construct() {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        //Check connection
        if($this->db->connect_error > 0) {
            die("Fel vid anslutning..." . $this->db->connect_error);
        }
    }

    //Methods 

    //Get courses
    public function getBucketlist() : array {
        $sql = "SELECT * FROM bucketlist;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Add 
    public function addItem(string $name, string $description, int $priority) : bool {
        //Check input
        if(!$this->setName($name)) {
            return false;
        }
        if(!$this->setDescription($description)) {
            return false;
        }
        if(!$this->setPriority($priority)) {
            return false;
        }

        $sql = "INSERT INTO bucketlist(name, description, priority) VALUES ('$this->name', '$this->description', '$this->priority');";

        $result = mysqli_query($this->db, $sql);

        return $result;
    }

    public function deleteItem(string $id) : bool {
        $id = intval($id);

        //SQL query
        $sql = "DELETE FROM bucketlist WHERE id = $id;";

        //Send query
        return mysqli_query($this->db, $sql);
    }

    //Get methods
    public function getName() : string {
        return $this->name;
    }
    public function getDescription() : string {
        return $this->description;
    }
    public function getPriority() : int {
        return $this->priority;
    }


    //Set methods
    public function setName(string $name) : bool {
        if($name != "") {
            $this->name = $this->db->real_escape_string($name);
            return true;
        } else {
            return false;
        }
    }
    public function setDescription(string $description) : bool {
        if($description != "") {
            $this->description = $this->db->real_escape_string($description);
            return true;
        } else {
            return false;
        }
    }
    public function setPriority(int $priority) : bool {
        if($priority > 0 && $priority < 6) {
            $this->priority = $priority;
            return true;
        } else {
            return false;
        }
    }
}