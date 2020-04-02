<div class="box_middle">
  <form name="frm_add_property" method="post" action="property-addnew.php<?=($id) ? '?id='.$id : '' ?>" enctype="multipart/form-data">
    <h3><?php echo ($id == "") ? 'Add' : 'Edit' ?> Property </h3>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <?php
      if (@$_SESSION['INSERT_ERROR']) {
        foreach (@$_SESSION['INSERT_ERROR'] as $err) {
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
            <input type="text" name="title[<?= $d_alllanguage['id'] ?>]" placeholder="<?= $d_alllanguage['title'] ?>" value="<?= isset($_SESSION['d_property']['title'][$d_alllanguage['id']]) ? $_SESSION['d_property']['title'][$d_alllanguage['id']] : '' ?>" class="text_box_midium" />
          <?php
          }
          ?>
        </td>
      </tr>
      <tr>
        <th valign="middle">Image:</th>
        <td align="right"><?php
                          if (@$_SESSION['d_property']['picture'] != '') {
                          ?>
            <img src="../<?= $_SESSION['d_property']['picture'] ?>" height="70" />
          <?php
                          }
          ?>

          <input type="hidden" name="picturepath" value="<?= isset($_SESSION['d_property']['picture']) ? $_SESSION['d_property']['picture'] : '' ?>" />
          <input type="file" name="picture" /></td>
      </tr>

      <tr>
        <th width="251" valign="top"> Category:</th>
        <td width="752" align="left">
          <select class="select_box" style="width:260px" name="categoryID">
            <option value="0">----Please Select----</option>

            <option value="1" <?= (@$_SESSION['d_property']['categoryID'] == 1) ? 'selected="selected"' : '' ?>><?= get_lang('categoryID1', $_SESSION['languageCode']) ?></option>
            <option value="2" <?= (@$_SESSION['d_property']['categoryID'] == 2) ? 'selected="selected"' : '' ?>><?= get_lang('categoryID2', $_SESSION['languageCode']) ?></option>
          </select>
        </td>
      </tr>

      <tr>
        <th width="251" valign="top"> Property Type:</th>
        <td width="752" align="left">
          <select class="select_box" style="width:260px" name="propertyTypeID">
            <?php $cond = "status='y' AND languageID=" . $_SESSION['languageID'] ?>
            <?= get_option_list('property_type', 'propertyTypeID', (@$_SESSION['d_property']['propertyTypeID'] ? $_SESSION['d_property']['propertyTypeID'] : 0), 'title', 'id', $cond) ?>

          </select>
        </td>
      </tr>
      <tr>
        <th width="265" valign="top">Number Of Rooms:</th>
        <td width="738" align="left">
          <input type="number" name="noOfRoom" value="<?= isset($_SESSION['d_property']['noOfRoom']) ? $_SESSION['d_property']['noOfRoom'] : '' ?>" class="text_box_midium" />
        </td>
      </tr>

      <tr>
        <th width="265" valign="top">Number Of Bedrooms:</th>
        <td width="738" align="left">
          <input type="number" name="noOfBedrooms" value="<?= isset($_SESSION['d_property']['noOfBedrooms']) ? $_SESSION['d_property']['noOfBedrooms'] : '' ?>" class="text_box_midium" />
        </td>
      </tr>

      <tr>
        <th width="265" valign="top">Number Of Bathrooms:</th>
        <td width="738" align="left">
          <input type="number" name="noOfBathrooms" value="<?= isset($_SESSION['d_property']['noOfBathrooms']) ? $_SESSION['d_property']['noOfBathrooms'] : '' ?>" class="text_box_midium" />
        </td>
      </tr>

      <tr>
        <th width="251"> Price:</th>
        <td width="752" align="left"><input type="text" name="price" value="<?= isset($_SESSION['d_property']['price']) ? $_SESSION['d_property']['price'] : '' ?>" class="text_box_midium" /><label>$</label></td>
      </tr>

      <tr>
        <th width="251"> Address:</th>
        <td width="752" align="left"><input type="text" name="location" value="<?= isset($_SESSION['d_property']['location']) ? $_SESSION['d_property']['location'] : '' ?>" class="text_box_midium" /></td>
      </tr>

      <tr>
        <th width="251"> City:</th>
        <td width="752" align="left"><input type="text" name="city" value="<?= isset($_SESSION['d_property']['city']) ?  $_SESSION['d_property']['city'] : '' ?>" class="text_box_midium" /></td>
      </tr>
      <tr>
        <th width="251">Area:</th>
        <td width="752" align="left"><input type="text" name="area" value="<?= isset($_SESSION['d_property']['area']) ? $_SESSION['d_property']['area'] : '' ?>" class="text_box_midium" />(sqft)</td>
      </tr>
      <tr>
        <th width="251">Lot Size:</th>
        <td width="752" align="left"><input type="text" name="lotSize" value="<?= isset($_SESSION['d_property']['lotSize']) ? $_SESSION['d_property']['lotSize'] : '' ?>" class="text_box_midium" /></td>
      </tr>
      <tr>
        <th width="265" valign="top">Bulit In Year:</th>
        <td width="738" align="left">
          <?php
          $time = time();
          $curryear = date("Y", $time);
          ?>

          <select name="buildYear" style="width:260px">

            <?php
            for ($i = $curryear; $i >= $curryear - 99; $i--) {
            ?>
              <option value="<?= $i ?>" <?= (@$_SESSION['d_property']['buildYear'] == $i) ? 'selected="selected"' : '' ?>><?= $i ?></option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>

      <tr>
        <th>Sale Status:</th>
        <td>
          <label><input type="radio" name="saleStatus" value="Y" <?php if (!$id || $_SESSION['d_property']['saleStatus'] == 'Y') { ?>checked="checked" <?php } ?> />Sold</label>
          <label><input type="radio" name="saleStatus" value="N" <?php if (@$_SESSION['d_property']['saleStatus'] == 'N') { ?>checked="checked" <?php } ?> />For Sale</label>
        </td>
      </tr>
      <tr>
        <th width="251">Description:</th>
        <td width="752" align="left">
          <?php
          foreach ($_SESSION['languages'] as $d_language) {
          ?>
            <textarea name="description[<?= $d_language['id'] ?>]" id="elm<?= $d_language['id'] ?>" class="" style="height:200px"><?= isset($_SESSION['d_property']['description'][$d_language['id']]) ? $_SESSION['d_property']['description'][$d_language['id']] : $d_language['title'] ?></textarea>
          <?php } ?>
        </td>
      </tr>

      <tr>
        <th width="251" valign="top">
          <h3>Images:</h3>
        </th>
        <td width="752" align="left"></td>
      </tr>

      <tr>
        <td colspan="2">
          <div id="container_dropzone" style="width:600px; margin:0; min-height:20px">
            <div class="uploader_cus"><a href="javascript:void(0)" class="upload_link" onclick="show_uploader();">Upload Pictures</a></div>
            <?php
            require_once('uploader/config.php'); //Config
            require_once('uploader/Uploader.php'); //Main php file
            $object_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0; //This is your post of article ID
            $user_id = 1; //This is the user that uploads the files
            $type_id = 1;
            add_uploader($object_id, $user_id, $type_id);
            ?>
            <b id="property_image_div"><?php show_files($object_id, $user_id, $type_id, 'images'); ?></b>


          </div>

          <style>
            img {
              margin: 0 10px 10px 0;
            }

            img.img {
              float: right;
              padding: 3px;
              border: 1px solid #ddd;
              -webkit-border-radius: 4px;
              -moz-border-radius: 4px;
              border-radius: 4px;
            }

            #container_dropzone {
              width: 100%;
              min-height: 300px;
              margin: 2em auto;
              padding: 1.5em;
              background: #fff;
              border: 1px solid #D8D8D8;
              -webkit-border-radius: 6px;
              -moz-border-radius: 6px;
              border-radius: 6px;
              -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, .065);
              -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, .065);
              box-shadow: 0 1px 4px rgba(0, 0, 0, .065);
            }
          </style>
        </td>
      </tr>

      <tr>
        <th>Status:</th>
        <td>
          <label><input type="radio" name="status" value="Y" <?php if (!$id || $_SESSION['d_property']['status'] == 'Y') { ?>checked="checked" <?php } ?> />Online</label>
          <label><input type="radio" name="status" value="N" <?php if (@$_SESSION['d_property']['status'] == 'N') { ?>checked="checked" <?php } ?> />Offline</label>
        </td>
      </tr>

      <tr>
        <td align="center" colspan="2">
          <input type="hidden" name="id" value="<?= $id ?>" />
          <input type="submit" name="submit" value="<?php echo ($id == '') ? 'Add' : 'Update' ?>" class="button" />
           </td>
      </tr>
    </table>
  </form>
  <div class="spacer"></div>
</div>
<div class="spacer"></div>
</div>
<script type="text/javascript">
  tinyMCE.init({
    // General options
    mode: "exact",
    elements: "elm1",
    theme: "advanced",


    plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,spellchecker,insertdatetime,preview,media,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
    // Theme options
    theme_advanced_buttons1: "bold,italic,underline,separator,formatselect,separator,bullist,numlist,undo,redo,image,link,unlink,separator,pastetext,pasteword,separator,spellchecker,cleanup,removeformat,code",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true,
    // Example content CSS (should be your site CSS)
    content_css: "css/content.css",
    // Drop lists for link/image/media/template dialogs
    template_external_list_url: "<?= $basepath ?>tinymce/examples/lists/template_list.js",
    external_link_list_url: "<?= $basepath ?>tinymce/examples/lists/link_list.js",
    external_image_list_url: "<?= $basepath ?>tinymce/examples/lists/image_list.js",
    media_external_list_url: "<?= $basepath ?>tinymce/examples/lists/media_list.js",
    // Style formats
    style_formats: [{
        title: 'Bold text',
        inline: 'b'
      },
      {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      },
      {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      },
      {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      },
      {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      },
      {
        title: 'Table styles'
      },
      {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }
    ],
    // Replace values for the template plugin
    template_replace_values: {
      username: "Some User",
      staffid: "991234"
    }
  });

  tinyMCE.init({
    // General options
    mode: "exact",
    elements: "elm2",
    theme: "advanced",


    plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,spellchecker,insertdatetime,preview,media,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
    // Theme options
    theme_advanced_buttons1: "bold,italic,underline,separator,formatselect,separator,bullist,numlist,undo,redo,image,link,unlink,separator,pastetext,pasteword,separator,spellchecker,cleanup,removeformat,code",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true,
    // Example content CSS (should be your site CSS)
    content_css: "css/content.css",
    // Drop lists for link/image/media/template dialogs
    template_external_list_url: "<?= $basepath ?>tinymce/examples/lists/template_list.js",
    external_link_list_url: "<?= $basepath ?>tinymce/examples/lists/link_list.js",
    external_image_list_url: "<?= $basepath ?>tinymce/examples/lists/image_list.js",
    media_external_list_url: "<?= $basepath ?>tinymce/examples/lists/media_list.js",
    // Style formats
    style_formats: [{
        title: 'Bold text',
        inline: 'b'
      },
      {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      },
      {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      },
      {
        title: 'Example 1',
        inline: 'span',
        classes: 'example1'
      },
      {
        title: 'Example 2',
        inline: 'span',
        classes: 'example2'
      },
      {
        title: 'Table styles'
      },
      {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }
    ],
    // Replace values for the template plugin
    template_replace_values: {
      username: "Some User",
      staffid: "991234"
    }
  });
</script>
</body>

</html>
<?php
/*Unset all session varialble which are used to set during add new product*/

?>