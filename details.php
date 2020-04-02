<?php
require("include/conn.php");
require("include/settings.php");
require("include/utils.php");
require('models/property.php');
require('models/property_type.php');

$id = $_REQUEST['id'];

$mProperty = new Property();
$data_sql_property = $mProperty->find($id);

$propertyTypeID = @$data_sql_property['propertyTypeID'];

$mPropertyType = new Propertytype();
$data_sql_propertytype = $mPropertyType->find($propertyTypeID);

?>

<!--Start Header-->
<?php include("view/header.php") ?>
<!--End Header-->
<script type="text/javascript" src="<?= $basepath ?>js/contact.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/detail.css" />
<!--SLIDER-->
<noscript>
    <style>
        .es-carousel ul {
            display: block;
        }
    </style>
</noscript>
<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">
    <div class="rg-image-wrapper">
        {{if itemsCount > 1}}
            <div class="rg-image-nav">
                <a href="#" class="rg-image-nav-prev">Previous Image</a>
                <a href="#" class="rg-image-nav-next">Next Image</a>
            </div>
        {{/if}}
        <div class="rg-image"></div>
        <div class="rg-loading"></div>
        <div class="rg-caption-wrapper">
            <div class="rg-caption" style="display:none;">
                <p></p>
            </div>
        </div>
    </div>
</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<script type="text/javascript" src="<?= $basepath ?>/slider/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?= $basepath ?>/slider/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?= $basepath ?>/slider/js/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?= $basepath ?>/slider/js/gallery.js"></script>
<!--END-SLIDER-->

<div id="container" class="myaccount">
    <div class="prdctTtl"><?= $data_sql_property['title'] ?></div>
    <p class="productftr"><?= $data_sql_property['location'] ?>, <?= $data_sql_property['city'] ?></p>

    <div id="slidingGalleryForm">

        <div class="dtlsgallery">
            <div id="rg-gallery" class="rg-gallery">
                <div class="rg-thumbs">
                    <!-- Elastislide Carousel Thumbnail Viewer -->
                    <div class="es-carousel-wrapper">
                        <div class="es-nav">
                            <span class="es-nav-prev">
                                <<</span> <span class="es-nav-next">>>
                            </span>
                        </div>
                        <div class="es-carousel">
                            <ul>
                                <?php
                                $sql_postpic = "select file from picture where object_id='" . $id . "' order by id ";
                                $re_postpic = $db->query($sql_postpic);
                                if (count($re_postpic)) {
                                    foreach($re_postpic as $d_postpic){
                                ?>
                                        <li><a href="#"><img src="<?= $basepath ?><?= get_product_pic("upload/" . $d_postpic['file']) ?>" data-large="<?= $basepath ?><?= get_product_pic("upload/" . $d_postpic['file']) ?>" alt="" /></a></li>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <li><a href="#"><img src="<?= $basepath ?><?= $data_sql_property['picture'] ?>" data-large="<?= $basepath ?><?= $data_sql_property['picture'] ?>" alt="" /></a></li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <!-- End Elastislide Carousel Thumbnail Viewer -->
                </div><!-- rg-thumbs -->
            </div>
            <div class="spacer"></div>
        </div>

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

        <div class="spacer"></div>
    </div>

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
                    <li><?= get_lang('price', $_SESSION['languageCode']) ?>: $<?= $data_sql_property['price'] ?></li>
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
                    <li><?= get_lang('city', $_SESSION['languageCode']) ?>: <?= $data_sql_property['city'] ?></li>
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
    <div class="spacer"></div>
</div>
<?php include("view/footer.php") ?>
</body>
</html>