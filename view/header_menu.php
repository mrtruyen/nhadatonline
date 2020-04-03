<link rel="stylesheet" type="text/css" href="<?= $basepath ?>menu/styles.css" />
<script type="text/javascript" src="<?= $basepath ?>menu/script.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $basepath ?>css/font-awesome.css" />
<div id="header">
    <div id="container">
        <div id="site-logo"><a href="<?= $basepath ?>"><img src="<?= $imagepath ?>/logo.jpg" /></a></div>

        <div id="header-right">

        </div>

        <div class="langFlag">
            <ul>
                <?php
                foreach ($_SESSION['languages'] as $d_alllanguage) {
                ?>
                    <li><a href="<?= $basepath ?>change_language.php?id=<?= $d_alllanguage['code'] ?>&rp=<?= $current_url ?>"><img height="20" width="28" src="<?= $basepath ?><?= $d_alllanguage['icon'] ?>" /></a></li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div id="cssmenu">
            <ul>
                <?php
                $headerMenu = get_header_menu();
                foreach($headerMenu as $d_menu){
                    $url = makeUrl($d_menu['title']) . "-" . $d_menu['postID'] . ".html";
                ?>
                    <li><a href="<?= $basepath ?><?= $url ?>"><?= $d_menu['title'] ?></a></li>
                <?php } ?>



            </ul>
        </div>


        <div class="spacer"></div>
    </div>
    <div class="spacer"></div>
</div>