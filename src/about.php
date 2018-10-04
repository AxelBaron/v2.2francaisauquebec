<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/load-data.php'; ?>
    <?php include 'inc/getLang.php'; ?>
    <?php include 'inc/head.php'; ?>
    <title>2 français au québec | <?php echo $translation->$lang->title->about; ?></title>
</head>
<body>
<?php include 'inc/header.php'; ?>
<section class="section container">
    <article class="article">
        <h2 class="title"><?php echo $translation->$lang->title->about; ?></h2>

        <div class="article__content">
            <p><?php echo $translation->$lang->about->one ?></p>
            <p><?php echo $translation->$lang->about->two ?></p>
            <p><?php echo $translation->$lang->about->three; ?></p>
        </div>

        <a class="link link--back" href="/<?php echo $lang; ?>" data-lang="Back to Comics"> <?php echo $translation->$lang->nav->linkBack; ?></a>
    </article> <!-- /.bd -->
</section> <!-- /.section.container -->

<?php include 'inc/footer.php'; ?>
<script src="/js/bundle.js"></script>
</body>
</html>