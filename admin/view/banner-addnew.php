<div class="box_middle">
  <form name="post_addform" id="post_addform" method="post" action="banner-addnew.php" enctype="multipart/form-data">
    <h3><?= (@$_REQUEST['id']) ? 'Edit' : 'Add' ?> Banner</h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <?php
      if (isset($_SESSION['UPDATE_SUCCESS'])) {
        unset($_SESSION['UPDATE_SUCCESS']);
      ?>
        <tr>
          <td colspan="2" align="center" class="" style="padding-right:10px; color:#00FF00; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
            Update successfully!
          </td>
        </tr>
      <?php } ?>

      <?php
      if (isset($_SESSION['INSERT_ERROR'])) {
        foreach ($_SESSION['INSERT_ERROR'] as $err) {
        ?>
          <tr>
            <td colspan="2" align="center" class="" style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
            <?= isset($errorMsg[$err]) ? $errorMsg[$err] : $err ?>
            </td>
          </tr>
        <?php } ?>
        <?php  unset($_SESSION['INSERT_ERROR']); ?>
      <?php } ?>

      <tr>
        <th width="265" valign="top">Image:</th>
        <td width="738" align="left"><?php
                                      if (isset($d_homepagelogo) && $d_homepagelogo['picture'] != '') {
                                      ?>
            <img src="../<?= $d_homepagelogo['picture'] ?>" height="70" width="70" />

            <input type="hidden" name="picturepath" value="<?= $d_homepagelogo['picture'] ?>" />
          <?php }
          ?>
          <input type="file" name="picture" />
        </td>
      </tr>


      <tr>
        <th width="265" valign="top">Order:</th>
        <td width="738" align="left">

          <select name="weight">
            <?php
            for ($i = 1; $i <= 50; $i++) {
            ?>
              <option value="<?= $i ?>"<?= (isset($d_homepagelogo) && $d_homepagelogo['order'] == $i) || (@$newBannerOrder && $i == $newBannerOrder) ? 'selected="selected"' : '' ?>><?= $i ?></option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>

      <tr>
        <th width="309">Status:</th>
        <td width="648" align="left">
          <input type="radio" value="Y" name="status" id="statusYes" <?php if (isset($d_homepagelogo) && $d_homepagelogo['status'] == 'Y' || !$id) { ?> checked="checked" <?php } ?> /><label for="statusYes">On </label>
          <input type="radio" value="N" name="status" id="statusNo" <?php if (isset($d_homepagelogo) && $d_homepagelogo['status'] == 'N') { ?> checked="checked" <?php } ?> /><label for="statusNo">Off </label>
        </td>
      </tr>
      <tr>
        <td align="center" colspan="2">
          <input type="hidden" name="id" value="<?= $id ?>" />
          <input type="submit" name="submit" value="Save" class="button" />
        </td>
      </tr>

    </table>
  </form>


  <div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
</body>

</html>