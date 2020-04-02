<div class="box_middle">
    <form name="addPost" method="post" action="post-addnew.php" enctype="multipart/form-data">
        <h3><?= (@$_REQUEST['id']) ? 'Edit' : 'Add' ?> Post</h3>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <?php
            if (@$_SESSION['UPDATE_SUCCESS']) {
                unset($_SESSION['UPDATE_SUCCESS']);
            ?>
                <tr>
                    <td colspan="2" align="center" class="" style="padding-right:10px; color:#0000FF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
                        Update successfully!
                    </td>
                </tr>
            <?php } ?>

            <?php
            // global $errMsg;
            if (@$_SESSION['INSERT_ERROR']) {
                foreach ($_SESSION['INSERT_ERROR'] as $err) {
            ?>
                    <tr>
                        <td colspan="2" align="center" class="" style="padding-right:10px; color:#FF0000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px;">
                            <?= isset($errorMsg[$err]) ? $errorMsg[$err] : $err ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php unset($_SESSION['INSERT_ERROR']); ?>
            <?php } ?>

            <tr>
                <th width="251"> Title:</th>
                <td width="752" align="left">
                <?php
                    foreach ($_SESSION['languages'] as $d_alllanguage) {
                    ?>
                        <input type="text" name="title[<?= $d_alllanguage['id'] ?>]" placeholder="<?= $d_alllanguage['title'] ?>" value="<?= @$_SESSION['d_post'] ? $_SESSION['d_post']['title'][$d_alllanguage['id']] : '' ?>" class="text_box_midium" />
                    <?php
                    }
                ?>
                </td>
            </tr>
            <tr>
                <th width="251">Image:</th>
                <td width="752" align="left">

                    <?php
                    if (@$_SESSION['d_post']['picture']) {
                    ?>
                        <span id="image_post">
                            <img src="../<?= isset($_SESSION['d_post']) ? $_SESSION['d_post']['picture'] : '' ?>" height="70" width="70" />
                            <p><a href="javascript:void(0)" onclick="delete_image('image_post','post','<?= $id ?>','picture','../<?= $_SESSION['d_post']['picture'] ?>')">Remove</a></p>
                        </span>
                    <?php
                    }
                    ?>
                    <br />
                    <input type="hidden" name="picturepath" value="<?= isset($_SESSION['d_post']['picture']) ? $_SESSION['d_post']['picture'] : '' ?>" />
                    <input type="file" name="picture" /></td>
            </tr>

            <tr>
                <th width="251"> Position:</th>
                <td width="752" align="left">
                    <input type="checkbox" name="position[]" id="chk_top" value="top" <?= isset($_SESSION['d_post']['position']) && (in_array('top', $_SESSION['d_post']['position'])) ? 'checked="checked"' : '' ?> /><label for="chk_top">Top</label>
                    <input type="checkbox" name="position[]" id="chk_bottom" value="bottom" <?= isset($_SESSION['d_post']['position']) && (in_array('bottom',$_SESSION['d_post']['position'])) ? 'checked="checked"' : '' ?> /><label for="chk_bottom">Bottom</label>

                </td>
            </tr>
            <?php
                foreach ($_SESSION['languages'] as $d_alllanguage) {
            ?>
            <tr>
                <th valign="top"> Content(<?= $d_alllanguage['title'] ?>) :</th>
                <td width="752" align="left">
                    <textarea id="contentbox_<?= $d_alllanguage['code'] ?>" name="content[<?= $d_alllanguage['id'] ?>]" style="width:100%; height:300px;"><?= isset($_SESSION['d_post']) ? $_SESSION['d_post']['content'][$d_alllanguage['id']] : '' ?></textarea> </td>
            </tr>
            <?php } ?>

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
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "exact",
        elements: "contentbox_vi",
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
        content_css: "<?= $basepath ?>tinymce/examples/css/content.css",
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
        elements: "contentbox_en",
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
        content_css: "<?= $basepath ?>tinymce/examples/css/content.css",
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

</html>