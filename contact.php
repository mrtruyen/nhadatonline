<?php
include('include/conn.php');
include_once("include/functions.php");
include('admin/models/property.php');

unset($_SESSION['name']);
unset($_SESSION['emailAddress']);
unset($_SESSION['phone']);
unset($_SESSION['message']);


$_SESSION['name']=trim($_POST['name']);
$_SESSION['emailAddress']=trim($_POST['emailAddress']);
$_SESSION['phone']=trim($_POST['phone']);
$_SESSION['message']=trim($_POST['message']);

$id=$_REQUEST['id'];
$data_property = Property::getProperty($conn,$id);
$url=$basepath."property/".makeUrl($data_property['title'])."-".$data_property['propertyID'].".html";

$query = "select adminEmailAddress from adminuser where id=1";
$re_query = mysqli_query($conn,$query);
$data_query = mysqli_fetch_array($re_query);
 $userEmail=$data_query['adminEmailAddress']; 
//  die($userEmail);
// $_SESSION['$userEmail']=$userEmail; die;
$mailcontent = '';
$mailcontent .= "<p>HOUSE INFO";
$mailcontent .= "<p>========================================================================";
$mailcontent .= "<p><strong>Title  : </strong>" . $data_property['title'] . "</p>";
$mailcontent .= "<p><strong>Link  : </strong>" . $url . "</p>";
$mailcontent .= "<p>========================================================================</p>";
$mailcontent .= "<p>USER INFO";
$mailcontent .= "<p>========================================================================";
$mailcontent .= "<p><strong>Name  : </strong> ".$_SESSION['name']."</p>";
$mailcontent .= "<p><strong>Email  : </strong> ".$_SESSION['emailAddress']."</p>";
$mailcontent .= "<p><strong>Phone: </strong> ".$_SESSION['phone']."</p>";
$mailcontent .= "<p><strong>Message  : </strong></p>";
$mailcontent .= "<p>".$_SESSION['message']."</p>";
$mailcontent .= "<p>========================================================================";


$headers ="From: ".$_SESSION['name']."<".$_SESSION['emailAddress'].">\n"; 
$headers .= "MIME-Version: 1.0\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
$subject = '[NhaDatOnline] Request info for house '.$data_property['title'];
// var_dump($subject); die();
$message ="<html><head></head><body>"."<style type=\"text/css\">
			<!--
			.style4 {font-size: x-small}
			-->
			</style>
			".$mailcontent."
			</body><html>"; 
			
// echo $mailcontent; die();
// try{
	
// }
// catch(Exception $e){
// 	echo $e->getMessage();
// }
@mail($userEmail,$subject, $message,$headers);
unset($_SESSION['name']);
unset($_SESSION['emailAddress']);
unset($_SESSION['subject']);

unset($_SESSION['message']);


$_SESSION['padding']=100;

$_SESSION['contact_success']=100;

@header("location:$url");
// if(@mail($userEmail,$subject, $message,$headers)){
// 	unset($_SESSION['name']);
// 	unset($_SESSION['emailAddress']);
// 	unset($_SESSION['subject']);

// 	unset($_SESSION['message']);
	

// 	$_SESSION['padding']=100;

// 	$_SESSION['contact_success']=100;

// 	@header("location:$url");
// }
//echo $mailcontent; die;

?>