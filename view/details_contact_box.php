<div class="detailsform">
    <h2><?= get_lang('detailsform_msg', $_SESSION['languageCode']) ?></h2>
    <div id="printmsg">
        <?php
        if (isset($_SESSION['contact_success']) && $_SESSION['contact_success'] == 100) {
            unset($_SESSION['contact_success']);
        ?>
            <font><?= get_lang('printmsg', $_SESSION['languageCode']) ?>!! </font>
        <?php
        }
        ?>
    </div>
    <form method="post" action="../contact.php">
        <p><input type="text" name="name" id="name" placeholder="<?= get_lang('contact_name', $_SESSION['languageCode']) ?>..." /></p>
        <p><input type="text" name="emailAddress" id="emailAddress" placeholder="<?= get_lang('contact_email', $_SESSION['languageCode']) ?>..." /></p>
        <p><input type="text" name="phone" id="phone" placeholder="<?= get_lang('contact_phone', $_SESSION['languageCode']) ?>..." /></p>
        <label style="color:white;">Message:</label>
        <p><textarea name="message" id="message" placeholder=""></textarea></p>
        <p>
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="submit" name="submit" value="<?= get_lang('request_info', $_SESSION['languageCode']) ?>" onclick="return valid_contact('printmsg')" /></p>

    </form>
    <div class="spacer"></div>
</div>