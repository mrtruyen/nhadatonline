<div class="listingFrame">

    <div class="lst-cont">
        <div class="lstThumb"><a href="<?= $url ?>"><img src="<?= $basepath ?><?= $data_sql_property['picture'] ?>" /></a></div>
        <div class="lstDtls">
            <div class="leftDtls">
                <div class="lstTtl"><a href="<?= $url ?>"><?= $data_sql_property['title'] ?></a></div>
                <div class="lst-feature">
                    <ul>
                        <li><span class="ftr-ttl"><?= $data_sql_property['location'] ?></span><?= $data_sql_property['city'] ?></li>
                        <li><?= get_lang('noOfBedrooms', $_SESSION['languageCode']) ?>:&nbsp;<?= $data_sql_property['noOfBedrooms'] ?> <?= get_lang('noOfBathrooms', $_SESSION['languageCode']) ?>:&nbsp;<?= $data_sql_property['noOfBathrooms'] ?> </li>
                        <li><span class="ftr-ttl"><?= $data_sql_propertytype['title'] ?></span><?= get_lang('area', $_SESSION['languageCode']) ?>:&nbsp;<?= $data_sql_property['area'] ?></label>(m2)</li>
                    </ul>
                    <div class="spacer"></div>
                </div>
                <div class="spacer"></div>
            </div>

            <div class="rightDtls">
                <?php
                if ($data_sql_property['categoryID'] == 1) {
                ?>
                    <span class="price">$<?= $data_sql_property['price'] ?></span>
                    <?php
                } else {
                    ?>
                        <span class="price">$<?= $data_sql_property['price'] ?>/Month</span>

                    <?php
                }
                    ?>
                    </p>
                    <a href="<?= $url ?>" class="viewbtn"><?= get_lang('show', $_SESSION['languageCode']) ?></a>
                    <div class="spacer"></div>
            </div>
            <div class="spacer"></div>
        </div>
        <div class="spacer"></div>
    </div>
    <div class="spacer"></div>
</div>