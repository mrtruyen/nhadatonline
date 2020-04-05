
<div class="box_middle">
<?php
// var_dump($_SESSION['DELETED_CHECKED']);
if(@$_SESSION['DELETED_CHECKED']){
	foreach($_SESSION['DELETED_CHECKED'] as $title){
?>
	<p align="center" class="" style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
                            <?= "Deleted ".$title ?>
	</p>
<?php	
	}
	unset($_SESSION['DELETED_CHECKED']);
}
?>
	<h3 style="text-align:left;">Property List</h3>
	<form id="frm-listing" name="" method="post" action="property.php">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="showlist">
			<thead>
				<tr>
					<td width="54">&nbsp;</td>
					<td width="139">Created Date</td>
					<td width="242">Title</td>
					<td width="242">Location</td>
					<td width="242">Property For</td>
					<td width="242">Bulit In Year</td>
					<td width="156">Status</td>
					<td width="102">Actions</td>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($total) {
					$i = 1;
					while ($d = @mysqli_fetch_array($r)) {
						$categoryID = $d['categoryID'];

				?>
						<tr height="40">
							<td align="center"><input type="checkbox" name="list[<?= $d['propertyID'] ?>]" /></td>
							<td align="left"><?= $d['createdDate'] ?></td>
							<td align="left"><?= $d['title'] ?></td>
							<td align="left"><?= $d['location'] ?>, <?= $d['city'] ?></td>
							<td align="left">
								<?php
								if ($categoryID == 1) {
									echo "Sell";
								}
								if ($categoryID == 2) {
									echo "Rent";
								}
								?>
							</td>
							<td align="left"><?= $d['buildYear'] ?></td>
							<td align="left"><?php
												if ($d['status'] == 'Y') {
													echo "Online";
												} else {
													echo "Offline";
												}
												?></td>
							<td align="left">
								<?php // if($post_edit!='none'):
								?>
								<a href="property-addnew.php?id=<?= $d['propertyID'] ?>" class="edit_link"></a>
								<?php // endif;if($post_delete!='none'):
								?>
								<a href="javascript:if(confirm('Are you sure you want to delete it?')){window.location='<?= $_SERVER['PHP_SELF'] ?>?&id=<?= $d['propertyID'] ?>&del=delete'}" class="delete_link"></a>
								<?php // endif;
								?> 
								<a href="<?= $basepath1 ?>/property/<?= makeUrl($d['title'], $d['propertyID']) ?>" target="_blank" class="view_link" title="View"></a>
								</td>
						</tr>
					<?php
						$i++;
					}
					?>
				<?php
				} else {
				?>
				<?php
				}
				?>
			</tbody>
		</table>
		<input type="hidden" name="delete_checked" value="1"/>
		<div style="width:100%" class="deleteall_margin"><input type="button" onclick="deleteChecked()" name="delete_all" class="back_botton" value="Delete" /></div>
		<div style="width:100%;padding-top:30px;"><?php echo Pages("property", $perpage, "property.php?", $cond); ?></div>
	</form>
	<div style="width:100%;padding-top:30px;">
		<div class="spacer"></div>
	</div>
	<div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
</body>
<script>
	function deleteChecked(){
		if(confirm('Are you sure you want to delete all checked items?')){
			$('#frm-listing').submit();
		}
	}
</script>
</html>