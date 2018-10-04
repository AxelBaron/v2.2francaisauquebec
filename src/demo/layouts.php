<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Base front</title>
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
<?php include 'inc/header.php'; ?>
<!-- /*
*
*
PUT ALL COMPONENTS (titles, btns ...) HERE
*
*
*/ -->
<div class="demo">
    <div class="container">
        <h2 class="demo__title">.here your layout name</h2>
        <div class="demo__intro">here your layout description</div>
        <div class="demo__content">

            <div class="demo__item demo__item--big">
                <p class="demo__classes">.all classes necessary for element, with modification classes</p>
                <p>put here html layout</p>
            </div>
        </div>

        <div class="demo__item ">
            <p class="demo__classes">.all classes necessary for element, with modification classes</p>
            <p>put here html layout</p>
        </div>

        <div class="demo__item ">
            <p class="demo__classes">.all classes necessary for element, with modification classes</p>
            <p>put here html layout</p>
        </div>

        <div class="demo__item ">
            <p class="demo__classes">.all classes necessary for element, with modification classes</p>
            <p>put here html layout</p>
        </div>
    </div>
</div> <!-- /.demo -->

<?php include "../inc/footer.php"; ?>
<?php include "../inc/cdn-scripts.php"; ?>
<script src="../js/bundle.js"></script>
</body>
</html>