<div class="box_middle">
      <h3>Admin Settings</h3>
      <form name="generalSettings" method="post" action="settings.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center" class="" style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
              <?php
                if (@$_SESSION['INSERT_ERROR']) {
                  foreach ($_SESSION['INSERT_ERROR'] as $err) {
                    echo isset($errorMsg[$err]) ? $errorMsg[$err] : $err;
                  }
                  unset($_SESSION['INSERT_ERROR']);
                }
              ?>
              
              <?php
              if (isset($_SESSION['PASSWORD_CHANGE'])) {
                unset($_SESSION['PASSWORD_CHANGE']);
              ?>
                Your Password is successfully changed
              <?php
              }
              ?>
            </td>
          </tr>
          <?php
              if (isset($_SESSION['UPDATE_SUCCESS'])) {
                unset($_SESSION['UPDATE_SUCCESS']);
              ?>
          <tr>
            <td colspan="2" align="center" class="" style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
            Your account information is updated successfully!
            </td>
          </tr>
          <?php
              }
          ?>
          <tr>
            <th>Name:</th>
            <td><input type="text" name="adminName" value="<?= $d_adminuser['adminName'] ?>" class="text_box_midium" /></td>

          </tr>
          <tr>
            <th>User Name:</th>
            <td><input type="text" name="userName" value="<?= $d_adminuser['username'] ?>" class="text_box_midium" /></td>

          </tr>
          <tr>
            <th>Admin Email:</th>
            <td>
              <input type="text" name="adminEmailAddress" value="<?= $d_adminuser['adminEmailAddress'] ?>" class="text_box_midium" /></td>

          </tr>

          <tr>
            <td><strong>New Password:</strong> </td>
            <td><input type="password" name="adminnewPassword" class="text_box_midium" /></td>

          </tr>
          <tr>
            <td align="left" class="" style="padding-left:10px;" colspan="2">(Leave the password fields blank to retain old password) </td>


          </tr>
          <tr>
            <th><strong>New Password (again):</strong></th>
            <td><input type="password" name="ReadminnewPassword" value="" class="text_box_midium" /></td>

          </tr>

          <tr>
            <td align="center" colspan="2">
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