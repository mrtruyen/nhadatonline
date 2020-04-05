<?php
require_once(dirname(__FILE__).'/../include/database.php');
class Property extends Database{
    static $table_name = "property";
    static $objectId = "propertyID";

    public function __construct()
    {
        parent::__construct();
    }

    public function find($id){
        $id = mysqli_real_escape_string($this->_conn, trim($id));
        $sql_property="select  * from ".self::$table_name." where ".self::$objectId."='$id' and languageID='".$_SESSION['languageID']."'";
        $re_sql_property=@mysqli_query($this->_conn,$sql_property);
        $data_property=@mysqli_fetch_array($re_sql_property);
        return $data_property;
    }

    public function getLimit($limit,$start,$cond=''){
        $sql_query = "select  * from property " . $cond . "  order by createdDate limit $start,$limit";
        $data = $this->query($sql_query);
        return $data;
    }

    public function getAll($cond=''){
        $sql_query = "select  * from property " . $cond . "  order by createdDate";
        $data = $this->query($sql_query);
        return $data;
    }
}