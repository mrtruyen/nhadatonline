<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome to NhaDatOnline</title>
	<meta name="description" content="NhaDatOnline" />
	<meta name="keywords" content="mua ban nha" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/common.css" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>menu/responsivemobilemenu.css" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>slider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= $basepath ?>slider/css/elastislide.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= $basepath ?>banner/styles.css">
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>select/selectric-home.css">
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/custom.css" />

	<script src="<?= $basepath ?>js/jquery-1.9.1.min.js"></script>
	<script src="<?= $basepath ?>js/bootstrap.min.js"></script>
	<!--Start Menu-->
	<script type="text/javascript" src="<?= $basepath ?>menu/responsivemobilemenu.js"></script>
	<!--End Menu-->


	<script src="<?= $basepath ?>select/jquery.selectric.js"></script>
	<script>
		$(function() {
			$('.select').selectric();

			$('.customOptions').selectric({
				optionsItemBuilder: function(itemData, element, index) {
					return element.val().length ? '<span class="ico ico-' + element.val() + '"></span>' + itemData.text : itemData.text;
				}
			});
		});
	</script>
	<script type="text/javascript">
		var basepath = '<?= $basepath ?>';
	</script>
	<script src="<?= $basepath ?>js/general.js"></script>

</head>

<body>

<?php include("view/header_menu.php"); ?>