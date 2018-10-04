<?php

    $trad = file_get_contents("data/translations.json");
    $translation = json_decode($trad);

    $comics = file_get_contents("data/comics.json");
    $comics = json_decode($comics);
?>