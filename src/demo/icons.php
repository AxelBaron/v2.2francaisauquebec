<?php
$current_page = 'icons';

$icons_name = '2francaisauquebec';
$icons_file = '../fonts/icon-' . $icons_name . '/icon-' . $icons_name . '.json';
$icons_json = json_decode(file_get_contents($icons_file));

$metadata = $icons_json->metadata;
$preferences = $icons_json->preferences->fontPref;
$iconsets = $icons_json->iconSets;
$selection = $iconsets[0]->selection;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AFont "<?php echo $icons_json->metadata->name; ?>"</title>
  <link rel="stylesheet" href="../css/main.css">
  <style type="text/css">

    * {
      box-sizing: border-box;
    }

    body {
      text-align: center;
    }

    .container {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      align-items: stretch;
      justify-content: center;
    }

    [class^="col-"] {
      padding: .5em;
    }

    .icon-container {
      display: flex;
      flex-direction: column;
      height: 100%;
      padding: 10px;
      text-align: center;
      border: 1px solid #e9e9e9;
      border-radius: 5px;
    }

    .icon-img * {
      font-size: 30px;
      margin: 1em auto;
    }

    .icon-class {
      flex: 1;
    }

    .info {
      margin: 1em;
      font-size: .9em;
    }
  </style>
</head>
<body class="<?php echo $current_page; ?>">

<h1>Font "<?php echo $icons_json->metadata->name; ?>"</h1>
<div class="container">
  <?php foreach ($selection as $icon): ?>
    <div class="col-sm-6 col-md-3">
      <div class="icon-container">
        <div class="icon-img"><span class="icon <?php echo $preferences->prefix . $icon->name; ?>"></span></div>
        <div class="icon-class"><code>icon <?php echo $preferences->prefix . $icon->name; ?></code></div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<div class="info">
  <?php echo count($selection); ?> icons, config file: "<i><?php echo $icons_file; ?></i>"
</div>

</body>
</html>
