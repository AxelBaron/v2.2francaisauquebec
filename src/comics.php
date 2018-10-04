<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/load-data.php'; ?>
    <?php include 'inc/getLang.php'; ?>
    <?php include 'inc/head.php'; ?>
    <title>2 français au québec | <?php echo $translation->$lang->title->home; ?></title>
</head>
<body>
<?php include 'inc/header.php'; ?>
<section class="section container">
    <?php
    // Get all vars
    $nbComics = count($comics->{$lang});
    $comics = array_reverse($comics->{$lang}, true);
    $selectedComics = $_GET['id'];
    $next = $selectedComics + 1;
    $prev = $selectedComics - 1;
    ?>

    <div class="comics-nav comics-nav--margin-top">
        <?php
        $txtPrev = $translation->{$lang}->{'nav'}->{'btnPreviousComic'};
        $txtNext = $translation->{$lang}->{'nav'}->{'btnNextComic'};
        if ($selectedComics != 0) {
            echo "<a class='comics-nav__link comics-nav__link--prev' href='/" . $lang . "/" . $comics[$prev]->{'id'} . '-' . $comics[$prev]->{'link'} . "'><span class='icon icon-arrow'></span>" . $txtPrev . "</a>";
        }
        ?>
        <select name="select-comics">
            <?php
            $txt = $translation->{$lang}->{'nav'}->{'selectComic'};
            echo '<option value="" class="placeholder">'.$txt.'</option>';
            for ($j = $nbComics - 1; $j > -1; $j--) {
                echo "<option value='/" . $lang . "/" . $comics[$j]->{'id'} . '-' . $comics[$j]->{'link'} . "'>" . $comics[$j]->{'id'} . ' : ' . $comics[$j]->{'name'} . "</option>";
            }
            ?>
        </select>
        <?php
        if ($selectedComics != $nbComics - 1) {
            echo "<a class='comics-nav__link comics-nav__link--next' href='/" . $lang . "/" . $comics[$next]->{'id'} . '-' . $comics[$next]->{'link'} . "'>" . $txtNext . "<span class='icon icon-arrow'></span></a>";
        }
        ?>
    </div> <!-- /.comics-nav -->


    <?php
    // Display the selected comics
    echo '<article class="comics comics--solo">';
    echo '<h2>' . $comics[$selectedComics]->{'id'} . ': ' . $comics[$selectedComics]->{'name'} . '</h2>';
    echo '<a href=/' . $lang . '/' . $comics[$selectedComics]->{'id'} . '-' . $comics[$selectedComics]->{'link'} . '><img oncontextmenu="return false" src="/' . $comics[$selectedComics]->{'img'} . '" alt="' . $comics[$selectedComics]->{'id'} . ' ' . $comics[$selectedComics]->{'name'} . '"/></a>';
    echo '</article> <!-- /.bd -->';

    ?>

    <div class="comics-nav comics-nav--margin-bottom">
        <?php
        $txtPrev = $translation->{$lang}->{'nav'}->{'btnPreviousComic'};
        $txtNext = $translation->{$lang}->{'nav'}->{'btnNextComic'};
        if ($selectedComics != 0) {
            echo "<a class='comics-nav__link comics-nav__link--prev' href='/" . $lang . "/" . $comics[$prev]->{'id'} . '-' . $comics[$prev]->{'link'} . "'><span class='icon icon-arrow'></span>" . $txtPrev . "</a>";
        }
        ?>
        <select name="select-comics">
            <?php
            $txt = $translation->{$lang}->{'nav'}->{'selectComic'};
            echo '<option value="" class="placeholder">'.$txt.'</option>';
            for ($j = $nbComics - 1; $j > -1; $j--) {
                echo "<option value='/" . $lang . "/" . $comics[$j]->{'id'} . '-' . $comics[$j]->{'link'} . "'>" . $comics[$j]->{'id'} . ' : ' . $comics[$j]->{'name'} . "</option>";
            }
            ?>
        </select>
        <?php
        if ($selectedComics != $nbComics - 1) {
            echo "<a class='comics-nav__link comics-nav__link--next' href='/" . $lang . "/" . $comics[$next]->{'id'} . '-' . $comics[$next]->{'link'} . "'>" . $txtNext . "<span class='icon icon-arrow'></span></a>";
        }
        ?>
    </div> <!-- /.comics-nav -->
</section> <!-- /.section.container -->

<section>
    <input type='hidden' id='limit' value='<?php echo $limit; ?>'/>
    <input type='hidden' id='repeat' value='<?php echo $repeat; ?>'/>
    <input type='hidden' id='readingWay' value='invert'/>
    <input type='hidden' id='nbComics' value='<?php echo $nbComics; ?>'/>
</section>

<?php include 'inc/footer.php'; ?>
<script src="/js/bundle.js"></script>
</body>
</html>