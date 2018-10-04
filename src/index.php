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
            // All ready defined
            // Invert comics with the lang for a desc reading.
            //$nbComics = count($comics->{$lang});
            //$comics = array_reverse($comics->{$lang}, true);
            $repeat= count($comics);
            $limit = $repeat - 2;
            ?>

            <?php
            // -1 because we have an 0 index.
            for($i=$repeat-1; $i >= $limit; $i--) {
                echo '<article class="comics">';
                echo '<h2>'.$comics[$i]->{'id'}.': '.$comics[$i]->{'name'}.'</h2>';
                echo '<a href=/'.$lang.'/'.$comics[$i]->{'id'}.'-'.$comics[$i]->{'link'}.'><img oncontextmenu="return false" src="'.$comics[$i]->{'img'}.'" alt="'.$comics[$i]->{'id'}.' '.$comics[$i]->{'name'}.'"/></a>';
                echo '</article> <!-- /.bd -->';
            }
            ?>
            </section> <!-- /.section.container -->

            <section>
                <input type='hidden' id='limit' value='<?php echo $limit; ?>'/>
                <input type='hidden' id='repeat' value='<?php echo $repeat; ?>'/>
                <input type='hidden' id='readingWay' value='invert'/>
                <input type='hidden' id='nbComics' value='<?php echo $nbComics; ?>'/>
                <button class="btn btn--show-comics"><?php echo $translation->$lang->nav->btnShowComicsInvert; ?></button>
            </section>

    <?php include 'inc/footer.php'; ?>
    <script src="/js/bundle.js"></script>
</body>
</html>