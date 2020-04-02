<?php
function get_title($tableName,$filedName,$value,$viewField){
	global  $conn;
	!$viewField?$viewField='title':'';
	!$filedName?$filedName='id':'';	
	$sql_table="select ".$viewField." from ".$tableName." where ".$filedName."='".$value."' ";
	$re_table=@mysqli_query($conn,$sql_table);
	$d_table=@mysqli_fetch_assoc($re_table);
	
	return $d_table[$viewField];
}
function get_title_con($tableName,$filedName,$value,$viewField,$cond){
	global  $conn;
	!$viewField?$viewField='title':'';
	!$filedName?$filedName='id':'';	
	
	
	$sql_table="select ".$viewField." from ".$tableName." where ".$filedName."='".$value."' ".$cond;
	$re_table=@mysqli_query($conn,$sql_table);
	$d_table=@mysqli_fetch_array($re_table);
	
	return $d_table[$viewField];
}
function get_option_list($tableName,$valueField='id',$selectedValue='0',$viewField='title',$orderBy='id',$conditon=''){
	global $conn;	
	// !$valueField?$valueField='id':''; //By Default value id
	// !$viewField?$viewField='title':'';//By Default Show Title
	
	$conditon=$conditon?$conditon:1; //Checking for condition is in or not
	$cond=" WHERE ".$conditon." "; 
	$cond.=$orderBy=='' || !$orderBy ? " order by ".$viewField : " order by ".$orderBy; //Checking for order by condition, if it's empty by Default Order by viewField
	
	$sql_table="select * from ".$tableName.$cond; //Query for select box 
	// var_dump($sql_table); die();
	$re_table=@mysqli_query($conn,$sql_table);
	$option='<option value="0">--Select--</option>'; //Default First select box option
	while($d_table=@mysqli_fetch_assoc($re_table))
	{
		$select = $d_table[$valueField]==$selectedValue ? 'selected="selected"' : ''; //Check this option is selected or not and assing attribute to a variable.
		$option.='<option value="'.$d_table[$valueField].'"'.$select.'>'.$d_table[$viewField].'</option>'; // Generate option 
	}
	return $option; //Return generated option
}

function get_all_language(){
	global $conn;
	$language = array();
	$select = "SELECT * FROM `language` ORDER BY `weight` ";
	$result = mysqli_query($conn,$select);
	while($re_language = mysqli_fetch_array($result)){
		$language[$re_language['shortName']]['id'] = $re_language['id'];
		$language[$re_language['shortName']]['code'] = $re_language['shortName'];
		$language[$re_language['shortName']]['title'] = $re_language['title'];
		$language[$re_language['shortName']]['icon'] = $re_language['icon'];
	}
	return $language;
}

function get_new_id($tabel_name,$column_name='id',$objectID_column='typeID'){
	global $conn;
	$select = "SELECT * FROM ".$tabel_name." ORDER BY ".$column_name." DESC LIMIT 0,1";
	$result = mysqli_query($conn,$select);
	if(mysqli_num_rows($result)>0){
		$query=mysqli_fetch_array($result);
		$new_id=$query[$objectID_column]+1;
	}else{
		$new_id=1;
	}
	return $new_id;
}

function get_max_order($tableName)
{
    global  $conn;
    $sql = "select max(weight) as weight from " . $tableName . " ";
    $re = @mysqli_query($conn, $sql);
    $d = @mysqli_fetch_array($re);
    return ($d['weight'] + 1);
}

function get_max_order_lan($tableName)
{
    global  $conn;
    $sql = "select max(weight) as weight from " . $tableName . " where languageID='" . $_SESSION['languageID'] . "'";
    $re = @mysqli_query($conn, $sql);
    $d = @mysqli_fetch_array($re);
    return ($d['weight'] + 1);
}

?>