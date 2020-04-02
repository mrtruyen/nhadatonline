<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To Admin Control Panel</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 6]>
    <link rel="stylesheet" type="text/css" href="css/style_IE6.css" />
    <![endif]-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/ddaccordion.js">
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/
</script>
<link rel="stylesheet" type="text/css" media="all" href="jsdatepick-calendar/jsDatePick_ltr.min.css" />
<!--FONTS-->
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
  <!--END-FONTS-->
  <!-- uploader -->
  <link rel="stylesheet" href="uploader/assets/css/bootstrap.css">
  <link rel="stylesheet" href="uploader/assets/css/style.css">
  <!-- jQuery & jQuery UI custom -->
  <script src="uploader/assets/js/jquery.js"></script>
  <script src="uploader/assets/js/jquery-ui-custom.js"></script>
  <!-- Fileupload -->
  <script src="uploader/assets/js/fileupload.js"></script>
  <!-- Lightbox -->
  <link rel="stylesheet" href="uploader/assets/css/lightbox.css">
  <script src="uploader/assets/js/lightbox-2.6.min.js"></script>
  <!-- Main script -->
  <script src="uploader/assets/js/script.js"></script>
  <!-- uploader -->
<script type="text/javascript">
ddaccordion.init({
	headerclass: "headerbar", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: true, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "selected"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="js/jquery.tablednd.0.7.min.js"></script>
<script type="text/javascript" src="js/utils.js"></script>

<link rel="stylesheet" type="text/css" href="css/style2.css" />
</head>
<body>
<div class="all_flag">

<a href="#"><?= @$_SESSION['languageCode'] ? $allLanguage[$_SESSION['languageCode']]['title'] : '' ?></a>

<?php
/****************************************************/
foreach($_SESSION['languages'] as $d_alllanguage)
{
?>
<a href="change_language.php?id=<?=$d_alllanguage['code']?>&rp=<?=$current_url?>" title="<?=$d_alllanguage['title']?>"><img height="20" width="28" src="../<?=$d_alllanguage['icon']?>" /></a>
<?php
}
?>

</div>