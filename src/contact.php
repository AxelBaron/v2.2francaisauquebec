<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/load-data.php'; ?>
    <?php include 'inc/getLang.php'; ?>
    <?php include 'inc/head.php'; ?>
    <title>2 français au québec | <?php echo $translation->$lang->title->contact; ?></title>
</head>
<body>
<?php include 'inc/header.php'; ?>
<section class="section container">
    <article class="article">
        <h2 class="title"><?php echo $translation->$lang->title->contact; ?></h2>
        <form id="contactForm" name="dd" class="form">
            <div class="input-group">
                <label for="Identity"><?php echo $translation->$lang->contact->identity; ?> :</label>
                <input class="input-identity" type="text" required placeholder="<?php echo $translation->$lang->contact->placeholderIdentity; ?>">
            </div>

            <div class="input-group">
                <label for="E-mail"><?php echo $translation->$lang->contact->email; ?> :</label>
                <input class="input-email" type="email" required placeholder="<?php echo $translation->$lang->contact->placeholderEmail; ?>">
            </div>

            <div class="input-group">
                <label for="Object"><?php echo $translation->$lang->contact->object; ?></label>
                <input class="input-object" type="text" required placeholder="<?php echo $translation->$lang->contact->placeholderObject; ?>">
            </div>

            <div class="input-group">
                <label for="Message"><?php echo $translation->$lang->contact->message; ?> :</label>
                <textarea class="input-message" required placeholder="<?php echo $translation->$lang->contact->placeholderMessage; ?>"></textarea>
            </div>
            <input type="submit" value="<?php echo $translation->$lang->contact->submit; ?>">
        </form>

        <a class="link link--back" href="/<?php echo $lang; ?>" data-lang="Back to Comics"> <?php echo $translation->$lang->nav->linkBack; ?></a>
    </article> <!-- /.bd -->
</section> <!-- /.section.container -->

<?php include 'inc/footer.php'; ?>
<script src="/js/bundle.js"></script>
</body>
</html>