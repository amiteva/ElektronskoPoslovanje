<?php


class User
{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'users'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getSellers($table = 'users'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE userRole='1'");

        $resultArray = array();

        while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $user;
        }

        return $resultArray;
    }
    public function getCustomers($table = 'users'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE userRole='2'");

        $resultArray = array();

        while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $user;
        }

        return $resultArray;
    }

    public function getUser($user_id = null, $table = 'users'){
        if(isset($user_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id={$user_id}");

            $resultArray = array();

        while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $user;
        }

        return $resultArray;
        }
    }
}