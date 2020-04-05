<div id="detailsSection">

    <div id="articleLft">
        <h2><?= get_lang('property_detail_heading', $_SESSION['languageCode']) ?> <?= $data_sql_property['title'] ?></h2>
        <p><?= get_lang('property_post_date', $_SESSION['languageCode']) ?>: <?= $data_sql_property['createdDate'] ?></p>
        <div class="prdct-descrip">
            <p><?= strip_tags($data_sql_property['description'], '<a><p><strong><b><u>') ?> </p>
            <div class="spacer"></div>
        </div>

        <div class="ftrdListing">
            <div class="fl-ttl"><?= get_lang('property_features_heading', $_SESSION['languageCode']) ?> <?= $data_sql_property['title'] ?> </div>

            <ul>
                <li><?= get_lang('price', $_SESSION['languageCode']) ?>: <?= $data_sql_property['price'] ?>&nbsp;<?= ($data_sql_property['categoryID']==1) ? 'tỷ' : 'triệu/tháng' ?></li>
                <li><?= get_lang('status', $_SESSION['languageCode']) ?>:
                    <?php
                    if ($data_sql_property['saleStatus'] == 'Y') {
                        echo get_lang('forSell', $_SESSION['languageCode']);
                    } else {
                        echo get_lang('sold', $_SESSION['languageCode']);
                    }
                    ?></li>
                <li><?= get_lang('noOfBedrooms', $_SESSION['languageCode']) ?>: <?= $data_sql_property['noOfBedrooms'] ?></li>
                <li><?= get_lang('lotSize', $_SESSION['languageCode']) ?>: <?= $data_sql_property['lotSize'] ?>(M2)</li>
                <li><?= get_lang('noOfBathrooms', $_SESSION['languageCode']) ?>: <?= $data_sql_property['noOfBathrooms'] ?></li>
                <li><?= get_lang('buildYear', $_SESSION['languageCode']) ?>: <?= $data_sql_property['buildYear'] ?></li>
                <li><?= get_lang('area', $_SESSION['languageCode']) ?>: <?= $data_sql_property['area'] ?>(M2)</li>
                <li><?= $data_sql_propertytype['title'] ?></li>
                <li><?= get_lang('city', $_SESSION['languageCode']) ?>: <?= @$lstCity[$data_sql_property['city']] ?></li>
            </ul>
            <div class="spacer"></div>
        </div>

        <div class="spacer"></div>
    </div>

    <div id="asideRgt">

        <div class="spacer"></div>
    </div>

    <div class="spacer"></div>
</div>