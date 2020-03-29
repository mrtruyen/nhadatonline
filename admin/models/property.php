<?php

class Property{
    static $table_name = "property";

    public static function getProperty($conn, $id){
        $sql_property="select  * from ".self::$table_name." where propertyID='$id' and languageID='".$_SESSION['languageID']."'";
        $re_sql_property=@mysqli_query($conn,$sql_property);
        $data_property=@mysqli_fetch_array($re_sql_property);
        return $data_property;
    }
}