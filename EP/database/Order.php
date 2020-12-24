<?php


class Order
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'orders'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function buy($user_id = null,$saveTable="orders",$fromTable = "cart"){
        if($user_id!=null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE user_id={$user_id};";
            $query.= "DELETE FROM {$fromTable} WHERE user_id={$user_id};";

            $result = $this->db->con->multi_query($query);
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    public function getProduct($id){
        $result = $this->db->con->query("SELECT item_name FROM product WHERE item_id={$id}");

        $item = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $item;
    }

}