<form id="wrp_search" name="search" method="get" action="search.php">
    <div class="wlcm-srch">

        <div class="text-part"><input type="text" name="q" value="<?= @$_REQUEST['q'] ?>" placeholder="<?= get_lang('q', $_SESSION['languageCode']) ?>" /></div>

        <input type="submit" value="<?= get_lang('btnSearch', $_SESSION['languageCode']) ?>">
        <div class="spacer"></div>
        <div class="select-part">
            <select class="select" name="cat" id="cat" onchange="getPrice()">
                <option value="1" <?= (@$_REQUEST['cat'] == 1) ? 'selected' : '' ?>><?= get_lang('cat1', $_SESSION['languageCode']) ?></option>
                <option value="2" <?= (@$_REQUEST['cat'] == 2) ? 'selected' : '' ?>><?= get_lang('cat2', $_SESSION['languageCode']) ?></option>

            </select>
        </div>

        <div class="select-part">
            <select class="select" name="minP" id="min_price">
                <option value="0" selected><?= get_lang('minP', $_SESSION['languageCode']) ?></option>
                <?php
                $maxPrice = get_max_price();
                $minPrice = get_min_price();
                // var_dump($maxPrice); die();
                // $dirrent = 50000;
                $dirrent = round(($maxPrice - $minPrice) / 10);
                // $dirrent = round($dirrent, -3);
                // var_dump($dirrent); die();
                for ($i = $minPrice; $i < $maxPrice; $i = $i + $dirrent) {
                    // var_dump($i); die();
                ?>
                    <option value="<?= $i ?>" <?php if ($i == $minPrice || @$_REQUEST['minP'] == $i) { ?> selected="selected" <?php } ?>><?= $i ?>&nbsp;tỷ</option>
                <?php
                }
                ?>
                <option value="<?= $maxPrice ?>" <?= (@$_REQUEST['minP'] == $maxPrice) ? 'selected' : '' ?>><?= $maxPrice ?>&nbsp;tỷ</option>
            </select>
        </div>

        <div class="select-part">
            <select class="select" name="maxP" id="max_price">
                <option value="0" selected><?= get_lang('maxP', $_SESSION['languageCode']) ?></option>
                <?php
                // 					$maxPrice=get_max_price();
                // 					$minPrice=get_min_price();
                // $dirrent = 50000;
                // $dirrent = (($maxPrice - $minPrice) / 10) + $minPrice;
                // $dirrent = round($dirrent, -3);
                for ($i = $minPrice; $i < $maxPrice; $i = $i + $dirrent) {
                ?>
                    <option value="<?= $i ?>" <?php if ($i == $maxPrice || @$_REQUEST['maxP'] == $i) { ?> selected="selected" <?php } ?>><?= get_float_value1($i) ?>&nbsp;tỷ</option>
                <?php
                }
                ?>
                <option value="<?= $maxPrice ?>" <?= (@$_REQUEST['maxP'] == $maxPrice) ? 'selected' : '' ?>><?= $maxPrice ?>&nbsp;tỷ</option>
            </select>
        </div>

        <div class="select-part">
            <select class="select" name="bed">
                <option value="-1" <?php if (@$_REQUEST['bed'] == '-1' || !@$_REQUEST['bed']) { ?> selected="selected" <?php } ?>><?= get_lang('bed', $_SESSION['languageCode']) ?></option>
                <?php
                $maxbed = get_max_bed();
                for ($i = 0; $i <= $maxbed; $i = $i + 1) {
                ?>
                    <option value="<?= $i ?>" <?php if (@$_REQUEST['bed'] == $i && @$_REQUEST['bed']) { ?> selected="selected" <?php } ?>><?= ($i) ?>+</option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="select-part">
            <select class="select" name="bath">
                <option value="-1" <?php if (@$_REQUEST['bath'] == '-1' || !@$_REQUEST['bath']) { ?> selected="selected" <?php } ?>><?= get_lang('bath', $_SESSION['languageCode']) ?></option>

                <?php

                $maxbath = get_max_bath();

                for ($i = 0; $i <= $maxbath; $i = $i + 1) {
                ?>
                    <option value="<?= $i ?>" <?php if (@$_REQUEST['bath'] == $i && @$_REQUEST['bath']) { ?> selected="selected" <?php } ?>><?= ($i) ?>+</option>
                <?php
                }
                ?>

            </select>
        </div>


        <div class="select-part">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle selectric" type="button" id="dropdownMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="label"><?= get_lang('more', $_SESSION['languageCode']) ?></span>
                    <b class="button"></b>
                </button>
                <?php
                    $minLotsize = get_min_lotsize();
                    $maxLotsize = get_max_lotsize();
                    $diff = ($maxLotsize - $minLotsize)/5 + $minLotsize;
                    // var_dump($minArea);
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMore">
                    <li>
                        <p><label><?= get_lang('lotSize', $_SESSION['languageCode']) ?></label>
                            <select class="select" name="lotSize" style="max-width:150px;">
                                <option value="" selected><?= get_lang('lotSize', $_SESSION['languageCode']) ?></option>
                                <?php
                                for ($i = $minLotsize; $i <= $maxLotsize; $i = $i + $diff) {
                                ?>
                                    <option value="<?= $i ?>" <?php if (@$_REQUEST['lotSize'] == $i && @$_REQUEST['lotSize']) {
                                                                echo "selected";
                                                            } ?>><?= ($i) ?>+ m2</option>
                                <?php
                                }
                                ?>
                            </select>
                        </p>
                    </li>
                    <li>
                        <p>
                            <label><?= get_lang('sqfeet', $_SESSION['languageCode']) ?></label>
                            <input type="text" name="minsqfeet" placeholder="<?= get_lang('minsqfeet', $_SESSION['languageCode']) ?>" value="<?= @$_REQUEST['minsqfeet'] ?>" class="searchtext" onkeypress="return isNumberKey(event)" />
                            <input type="text" name="maxsqfeet" placeholder="<?= get_lang('maxsqfeet', $_SESSION['languageCode']) ?>" value="<?= @$_REQUEST['maxsqfeet'] ?>" class="searchtext" onkeypress="return isNumberKey(event)" />
                        </p>
                    </li>

                    <li>
                        <p>
                            <label><?= get_lang('buildYear', $_SESSION['languageCode']) ?></label>
                            <input type="text" name="minbuildYear" placeholder="<?= get_lang('minbuildYear', $_SESSION['languageCode']) ?>" value="<?= @$_REQUEST['minbuildYear'] ?>" class="searchtext" onkeypress="return isNumberKey(event)" />
                            <input type="text" name="maxbuildYear" placeholder="<?= get_lang('maxbuildYear', $_SESSION['languageCode']) ?>" value="<?= @$_REQUEST['maxbuildYear'] ?>" class="searchtext" onkeypress="return isNumberKey(event)" />
                        </p>
                    </li>

                    <li role="separator" class="divider"></li>
                    <li>
                        <p><a class="btn btn-default btn-primary"><?= get_lang('btnApply', $_SESSION['languageCode']) ?></a></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="spacer"></div>
    </div>


</form>