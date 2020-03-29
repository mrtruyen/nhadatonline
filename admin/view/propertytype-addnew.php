<div class="box_middle">
    <form name="generalSettings" method="post" action="propertytype-addnew.php" enctype="multipart/form-data">
        <h3><span style="text-align:left;"></span><?= ($id == "") ? 'Add new' : 'Edit' ?> Property Type</h3>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <?php
                if (@$_SESSION['INSERT_ERROR']) {
                foreach ($_SESSION['INSERT_ERROR'] as $err) {
            ?>
                    <tr>
                        <td colspan="2" align="center" class="" style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
                            <?= isset($errorMsg[$err]) ? $errorMsg[$err] : $err ?>
                        </td>
                    </tr>
            <?php
                }
                unset($_SESSION['INSERT_ERROR']);
                }
            ?>
            <?php
            if (@$_SESSION['UPDATE_SUCCESS']) {
                unset($_SESSION['UPDATE_SUCCESS']);
            ?>
                <tr>
                    <td colspan="2" align="center" class="" style="padding-right:10px; color:#00FF00; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
                        <?php
                        echo "Updated successfully";
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <th width="251"> Title:</th>
                <td width="251" align="left">
                <?php
                foreach ($_SESSION['languages'] as $d_alllanguage) {
                ?>
                <input type="text" name="title[<?= $d_alllanguage['id'] ?>]" placeholder="<?= $d_alllanguage['title'] ?>" value="<?= $id ? $propertyType['title'][$d_alllanguage['id']] : '' ?>" class="text_box_midium" />
                <?php
                }
                ?>
                </td>
            </tr>
            

            <tr>
                <th width="309">Status:</th>
                <td width="648" align="left">
                    <input type="radio" value="Y" name="status" id="statusYes" <?= (!$id || $propertyType['status'] == 'Y') ? 'checked="checked"' : '' ?> /><label for="statusYes">Yes </label>
                    <input type="radio" value="N" name="status" id="statusNo" <?= ($id && $propertyType['status'] == 'N') ? 'checked="checked"' : '' ?> /><label for="statusNo">No </label>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="hidden" name="id" value="<?= $id ?>" />
                    <input type="submit" name="submit" value="Save" class="button" />
            </tr>

        </table>
    </form>

    <div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
</body>

</html>