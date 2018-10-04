<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/load-data.php'; ?>
    <?php include 'inc/getLang.php'; ?>
    <?php include 'inc/head.php'; ?>
    <title>2 français au québec | <?php echo $translation->$lang->title->rss; ?></title>
</head>
<body>
<?php include 'inc/header.php'; ?>
<section class="section container">
    <article class="article">
        <h2 class="title">RSS</h2>

        <div class="article__content">
            <p><?php echo $translation->$lang->rss->one; ?></p>
            <a class="link link--rss">http://2francaisauquebec.com/rss.xml</a>
            <p><?php echo $translation->$lang->rss->two; ?></p>
        </div> <!-- /.article--content -->

        <a class="link link--back" href="/<?php echo $lang; ?>" data-lang="Back to Comics"> <?php echo $translation->$lang->nav->linkBack; ?></a>
    </article> <!-- /.article -->
</section> <!-- /.section.container -->

<?php include 'inc/footer.php'; ?>
<script src="/js/bundle.js"></script>
</body>
</html>