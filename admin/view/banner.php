<div class="box_middle">
<?php
      if (isset($_SESSION['DB_ERROR'])) {
      ?>
	<h4 style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif;">
		<?= $_SESSION['DB_ERROR'] ?>
	</h4>
      <?php  unset($_SESSION['DB_ERROR']); ?>
      <?php } ?>
<h3 style="text-align:left;">Banner List <a href="banner-addnew.php" class="button">Add New</a></h3>
<form name="" method="post" action="banner.php">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="showlist">
<thead>
  <tr >
   <td width="54" >&nbsp;</td>
      <td width="242"  > Image </td>
	  <td width="156"  >Status</td>
      <td width="102"  >Actions</td>  
  </tr>
</thead>
<tbody>  
<?php
$r=mysqli_query($conn,"select 1 from banner");
$total=mysqli_num_rows($r);
$perpage =10;
if($total)
{
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$startpoint = ($page * $perpage) - $perpage;
	$sql="select * from banner order by `order`  LIMIT $startpoint,$perpage";
	$r=mysqli_query($conn,$sql);
$i=1;
while($d=@mysqli_fetch_array($r))
{

  ?>
  <tr height="40">
    <td align="center"><input type="checkbox" name="id_<?=$d['id']?>" /></td>
    <td align="left"><img src="../<?=$d['picture']?>" height="70" width="70" /></td>
	<td align="left"><?php
	if($d['status']=='Y')
	{
		echo "Online";
	}
	else
	{
		echo "Offline";
	}
	?></td>
    <td align="left">
    <a href="banner-addnew.php?id=<?=$d['id']?>" class="edit_link" ></a>
	<a href="javascript:if(confirm('Are you sure you want to delete it?')){window.location='<?=$_SERVER['PHP_SELF']?>?&id=<?= $d['id']?>&del=delete'}" class="delete_link"></a>
   </td>
  </tr>
 <?php
 $i++;
 }
 ?>
 <?php
 }
 else
 {
 ?>
 <?php
 }
 ?> 
</tbody>
</table>
<div style="width:100%"  class="deleteall_margin"><input type="submit" name="delete_all" class="back_botton" value="Delete" /></div>
<div style="width:100%;padding-top:30px;"><?php	echo Pages("banner",$perpage,"banner.php?"); ?>
</form>
<div style="width:100%;padding-top:30px;">
<div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
</body>
</html>
