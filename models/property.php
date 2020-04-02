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

    public function getWhere($cond){
        $sql_query = "select  * from property where status='Y' " . $cond . "  and languageID='".$_SESSION['languageID']."'  order by createdDate";
        $data = $this->query($sql_query);
        return $data;

    }
}