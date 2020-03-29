<div class="box_middle">
  <?php
  if (isset($_SESSION['DB_ERROR'])) {
  ?>
    <h4 style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif;">
      <?= $_SESSION['DB_ERROR'] ?>
    </h4>
    <?php unset($_SESSION['DB_ERROR']); ?>
  <?php } ?>
  <h3 style="text-align:left;">All Post <a href="post-addnew.php" class="button">Add New</a></h3>
  <form name="" method="post" action="post.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="showlist" id="table-3">
      <thead>
        <tr>
          <td width="44">&nbsp;</td>
          <td width="681">Title</td>
          <td width="114">Position</td>
          <td width="114">Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($total) {
          
          $i = 1;
          while ($d = @mysqli_fetch_array($r)) {
        ?>
            <tr height="40" id="<?= $d['id'] ?>">
              <td align="center"><input type="checkbox" name="list[<?= $d['postID'] ?>]" /></td>
              <td align="left"><?= htmlspecialchars_decode($d['title']) ?></td>
              <td align="left"><?= $d['position'] ?></td>
              <td align="left">
                <?php // if($posts_edit!='none'):
                ?>
                <a href="post-addnew.php?id=<?= $d['postID'] ?>" class="edit_link"></a>
                <?php // endif;if($posts_delete!='none'):
                ?>
                <a href="javascript:if(confirm('Are you sure you want to delete it?')){window.location='<?= $_SERVER['PHP_SELF'] ?>?&id=<?= $d['postID'] ?>&del=delete'}" class="delete_link"></a>
                <?php // endif;
                ?>
                <a href="<?= $basepath1 ?><?= makeUrl($d['title'], $d['postID']) ?>" target="_blank" class="view_link" title="View"></a>
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
    <div style="width:100%" class="deleteall_margin"><input type="submit" name="delete_all" class="back_botton" value="Delete" /></div>
  </form>
  <div style="width:100%;padding-top:30px;"><?php echo Pages("post", $perpage, "post.php?", $cond); ?>
    <div class="spacer"></div>
  </div>
  <div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
</body>
<script type="text/javascript" src="js/jquery.tablednd.0.7.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // Initialise the first table (as before)

    $('#table-3').tableDnD({
      onDrop: function(table, row) {

        var val = $.tableDnD.serialize();
        save_order_single(val, 'allpost');

      }
    });

  });
</script>

</html>