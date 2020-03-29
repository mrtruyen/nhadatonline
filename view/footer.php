<?php
// include_once("functions.php");
// $sql_socials="select  * from ".$prev."socials ";
// $re_sql_socials=mysqli_query($conn,$sql_socials) or die(mysqli_error($conn));
// $data_sql_socials=mysqli_fetch_array($re_sql_socials);


// $sql_settings="select  * from ".$prev."settings ";
// $re_sql_settings=mysqli_query($conn,$sql_settings) or die(mysqli_error($conn));
// $data_sql_settings=mysqli_fetch_array($re_sql_settings);
?>
<div id="footer">

<div id="container" class="footer_bottom">
<div class="footer_left">
<ul>
 <?php
		// $connmenu = "";
		// $sql_menu="select * from ".$prev."footermenu where languageID='".$languageID."'  ".$connmenu." order by weight";
		// $re_menu=mysqli_query($conn,$sql_menu);
		// while($d_menu=mysqli_fetch_array($re_menu))
		// {
		// 	if($d_menu['type']=='C')
		// 	{
		// 		$sql_categoryheader="select * from ".$prev."category where typeID ='".$d_menu['tableID']."' and languageID='".$languageID."' ";
		// 		$re_categoryheader=mysqli_query($conn,$sql_categoryheader);
		// 		$d_categoryheader=mysqli_fetch_array($re_categoryheader);
		// 		$url=$basepath.$d_categoryheader['URL_SEOTOOL']."/";
		// 	}
		// 	elseif($d_menu['type']=='PA')
		// 	{
		// 		$sql_pagesheader="select URL_SEOTOOL from ".$prev."pages where id ='".$d_menu['tableID']."'";
		// 		$re_pagesheader=mysqli_query($conn,$sql_pagesheader);
		// 		$d_pagesheader=mysqli_fetch_array($re_pagesheader);
		// 		$url=$basepath.$d_pagesheader['URL_SEOTOOL'];
		// 	}
		// 	elseif($d_menu['type']=='PO')
		// 	{
		// 		$sql_allpostheader="select URL_SEOTOOL from ".$prev."allpost where id ='".$d_menu['tableID']."'";
		// 		$re_allpostheader=mysqli_query($conn,$sql_allpostheader);
		// 		$d_allpostheader=mysqli_fetch_array($re_allpostheader);
		// 		$url=$basepath.$d_allpostheader['URL_SEOTOOL'];
		// 	}
				?>
							<?php
								$query_post = "select * from post where languageID='".$languageID."' and FIND_IN_SET('bottom',position)>0 order by id";
								$re_menu=mysqli_query($conn,$query_post);
								while($d_menu=mysqli_fetch_array($re_menu))
								{ 
									$url = makeUrl($d_menu['title']) . "-" . $d_menu['id'] . ".html";
							?>
           					 <li><a href="<?=$url?>" class="active"><?=$d_menu['title']?></a></li>
                    <?php
					}
					?> 
</ul>
<div class="spacer"></div>
<div class="copyright">@NhaDatOnline 2020</div>
</div>

<div class="footer_right">
<ul>
<li><a href="#" target="_blank" class="linkdin"></a></li>
<li><a href="#" target="_blank" class="twitter"></a></li>
<li><a href="#" target="_blank" class="fb"></a></li>
</ul>
</div>

<div class="spacer"></div>
</div>

</div>


            <script type="text/javascript">
				$('.footer_part ul').contents().filter(function() {
					return this.nodeType === 3;
				}).remove();
			</script> 