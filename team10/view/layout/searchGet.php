<?php
$term = "";
$keywords = "";
if (isset($_GET["keywords"]))
    $keywords = $_GET["keywords"];
$term .= "(name LIKE '%$keywords%' OR address LIKE '%$keywords%' OR detailed LIKE '%$keywords%')";
