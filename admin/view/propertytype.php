<div class="box_middle">
  <?php
  if (isset($_SESSION['DB_ERROR'])) {
  ?>
    <h4 style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif;">
      <?= $_SESSION['DB_ERROR'] ?>
    </h4>
    <?php unset($_SESSION['DB_ERROR']); ?>
  <?php } ?>
  <h3 style="text-align:left;">Property Type List <a href="propertytype-addnew.php" class="button">Add New</a></h3>
  <form id="frm-listing" name="" method="post" action="propertytype.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="showlist" id="table-3">
      <thead>
        <tr>
          <td width="74">&nbsp;</td>

          <td width="425">Property Type</td>


          <td width="122">Status</td>
          <td width="141">Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($total) {
          $i = 1;
          while ($d_propertytype = @mysqli_fetch_array($r)) {
        ?>
            <tr height="40" id="<?= $d_propertytype['propertyTypeID'] ?>">
              <td align="center"><input type="checkbox" name="list[<?= $d_propertytype['propertyTypeID'] ?>]" /></td>

              <td align="left"><?= $d_propertytype['title'] ?></td>


              <td align="left">
                <?php
                if ($d_propertytype['status'] == 'Y') {
                  echo "Online";
                } else {
                  echo "Offline";
                }
                ?> </td>
              <td align="left"><a href="propertytype-addnew.php?id=<?= $d_propertytype['propertyTypeID'] ?>" class="edit_link"></a>
                <a href="javascript:if(confirm('Are you sure you want to delete it?')){window.location='<?= $_SERVER['PHP_SELF'] ?>?&id=<?= $d_propertytype['propertyTypeID'] ?>&del=delete'}" class="delete_link"></a></td>
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
    <div style="width:100%" class="deleteall_margin"><input type="button" onclick="deleteChecked()" class="back_botton" value="Delete" /></div>
  </form>
  <div style="width:100%;padding-top:30px;"><?php echo Pages("property_type", $perpage, "propertytype.php?", $cond); ?>
    <div class="spacer"></div>
  </div>
  <div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    // Initialise the first table (as before)

    $('#table-3').tableDnD({
      onDrop: function(table, row) {

        var val = $.tableDnD.serialize();
        save_order(val, 'propertytype');

      }
    });

  });
</script>
</body>
<script>
	function deleteChecked(){
		if(confirm('Are you sure you want to delete all checked items?')){
			$('#frm-listing').submit();
		}
	}
</script>
</html>