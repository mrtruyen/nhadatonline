<?php
require_once(dirname(__FILE__).'/../include/database.php');
class Post extends Database{
    static $table_name = "post";
    static $objectId = "postID";

    public function __construct()
    {
        parent::__construct();
    }

    public function find($id){
        $id = mysqli_real_escape_string($this->_conn, trim($id));
        $sql_query="select  * from ".self::$table_name." where ".self::$objectId."='$id' and languageID='".$_SESSION['languageID']."'";
        
        // $re_sql_property=@mysqli_query($this->_conn,$sql_property);
        // $data_property=@mysqli_fetch_array($re_sql_property);
        $data = $this->query($sql_query);
        return @$data[0];
    }

}