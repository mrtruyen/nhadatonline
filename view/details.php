<div id="container" class="myaccount">
    <div class="prdctTtl"><?= $data_sql_property['title'] ?></div>
    <p class="productftr"><?= $data_sql_property['location'] ?>, <?= @$lstCity[$data_sql_property['city']] ?></p>

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

        <?php include("view/details_contact_box.php") ?>

        <div class="spacer"></div>
    </div>

    <?php include("view/details_feature_box.php") ?>
    <div class="spacer"></div>
</div>

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