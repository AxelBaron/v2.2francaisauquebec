<header class="header">
    <div class="header__primary container">
        <a class="header__logo" href="/<?php echo $lang; ?>"><img src="/img/logo--large.png" alt=""></a>
        <h1 class="header__title">
            <a class="header__title__container" href="/<?php echo $lang; ?>">
                <span class="header__title__number">2</span>
                <span class="header__title__content">
                <span class="header__title__item">français au</span>
                <span class="header__title__item">québec</span>
            </span>
            </a>
        </h1>
    </div>

    <div class="header__nav container  <?php if ($pageKeyForLang != "") {
        echo 'margin-top';
    } ?>">

        <button class="header__nav__trigger">
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            Menu
        </button>
        <div class="lang">
            <button class="lang__trigger" data-currentlang="<?php echo $lang; ?>"><?php echo $lang; ?></button>
            <div class="lang__content">
                <?php
                $translationArray = json_decode(json_encode($translation), true);
                foreach ($translationArray as $key => $val) {
                    if ($key != $lang) {
                        if (isset($explodedUrl[2])) {
                            $currentLangLoop = $key;
                            $miroirLink = $val['pageLink'][$pageKeyForLang];
                            echo '<a href="/' . $currentLangLoop . '/' . $miroirLink . '" class="lang__item" data-changelang="fr">' . $key . '</a>';
                        } else {
                            echo '<a href="/' . $key . '" class="lang__item" data-changelang="fr">' . $key . '</a>';
                        }
                    }
                }
                ?>
            </div>
        </div> <!-- /.lang -->

        <div class="header__nav__content">
            <div class="header__nav__primary">

                <nav class="nav">
                    <a class="nav__item" href="/<?php echo $lang; ?>"><?php echo $translation->$lang->nav->home; ?></a>
                    <a class="nav__item"
                       href="/<?php echo $lang; ?>/<?php echo $translation->$lang->pageLink->about; ?>"><?php echo $translation->$lang->nav->about; ?></a>
                </nav> <!-- /.nav -->

                <div class="socials-networks">
                    <a href="https://www.facebook.com/2francaisauquebec" class="socials-networks__item"><span
                                class="icon icon-facebook"></span></a>
                    <a href="https://twitter.com/2FRauQC" class="socials-networks__item"><span
                                class="icon icon-twitter"></span></a>
                    <a href="/<?php echo $lang; ?>/<?php echo $translation->$lang->pageLink->rss; ?>"
                       class="socials-networks__item"><span class="icon icon-rss"></span></a>
                    <a href="/<?php echo $lang; ?>/<?php echo $translation->$lang->pageLink->contact; ?>""><span
                                class="icon icon-email"></span></a>
                </div> <!-- /.socials-networks -->

                <div class="lang">
                    <button class="lang__trigger" data-currentlang="<?php echo $lang; ?>"><?php echo $lang; ?></button>
                    <div class="lang__content">
                        <?php
                        $translationArray = json_decode(json_encode($translation), true);
                        // If we're not on solo comic page
                        if ($pageKeyForLang != 'comic') {
                            foreach ($translationArray as $key => $val) {
                                // Get the URL equivalent in the current lang
                                if ($key != $lang) {
                                    if (isset($explodedUrl[2])) {
                                        $currentLangLoop = $key;
                                        $miroirLink = $val['pageLink'][$pageKeyForLang];
                                        echo '<a href="/' . $currentLangLoop . '/' . $miroirLink . '" class="lang__item" data-changelang="'.$key.'">' . $key . '</a>';
                                    } else {
                                        echo '<a href="/' . $key . '" class="lang__item" data-changelang="fr">' . $key . '</a>';
                                    }
                                }
                            }
                        } else {
                            // If we are on solo comic page
                            $tmp = explode('-', $explodedUrl[2]);
                            $id =  $tmp[0];
                            foreach ($translation as $key => $val){
                                if ($key != $lang) {
                                    // If comic exist on this lang
                                    if (isset($comics->{$key}[$id]->{'link'})){
                                        echo '<a href="/' . $key . '/' . $id.'-'.$comics->{$key}[$id]->{'link'} . '" class="lang__item" data-changelang="'.$key.'">' . $key . '</a>';
                                    }else{
                                        // If not
                                        echo '<a onclick="alert(\' '.$translation->{$key}->{'nav'}->{'errorComic'}.' \');" class="lang__item" data-changelang="'.$key.'">' . $key . '</a>';
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div> <!-- /.lang -->
            </div> <!-- /.header__nav__primary -->
        </div> <!-- /.header__nav__content -->
        <?php if ($pageKeyForLang == "") { ?>
            <div class="header__nav__secondary">
                <div class="reading-tools">
                    <button class="reading-tools__invert-reading-way" type="button">
                        <?php echo $translation->$lang->nav->readingWay; ?>
                    </button>
                    <div class="reading-tools__select-comic">
                        <?php
                        // Get all vars
                        $nbComics = count($comics->{$lang});
                        $comics = array_reverse($comics->{$lang}, true);
                        ?>

                        <select name="select-comics">
                            <?php
                            $txt = $translation->{$lang}->{'nav'}->{'selectComic'};
                            echo '<option value="" class="placeholder">' . $txt . '</option>';
                            for ($j = $nbComics - 1; $j > -1; $j--) {
                                echo "<option value='/" . $lang . "/" . $comics[$j]->{'id'} . '-' . $comics[$j]->{'link'} . "'>" . $comics[$j]->{'id'} . ' : ' . $comics[$j]->{'name'} . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div> <!-- /.reading-tools -->
            </div> <!-- /.header__nav__secondary -->
        <?php } ?>
    </div> <!-- /.header__nav.container -->
</header> <!-- /.header -->