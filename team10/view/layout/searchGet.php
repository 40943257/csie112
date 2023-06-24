<?php
$term = "";
$keywords = "";
if (isset($_GET["keywords"]))
    $keywords = $_GET["keywords"];
$term .= "(T10_agency_info.name LIKE '%$keywords%' OR T10_agency_info.address LIKE '%$keywords%' OR T10_agency_info.detailed LIKE '%$keywords%')";

$selectWithGov = "";
for ($i = 0; $i < count($gov); $i += 2) {
    if (isset($_GET["with" . $gov[$i + 1]])) {
        if ($selectWithGov == "")
            $selectWithGov .= "(T10_cooperative.government = '" . $gov[$i + 1] . "'";
        else
            $selectWithGov .= " OR T10_cooperative.government = '" . $gov[$i + 1] . "'";
    }
}

if ($selectWithGov != "") {
    $selectWithGov .= ")";
    $term .= " AND " . $selectWithGov;
}

$addresses = "";
for ($i = 0; $i < count($gov); $i += 2) {
    if (isset($_GET[$gov[$i + 1]])) {
        if ($addresses == "")
            $addresses .= "(T10_agency_info.address LIKE '%" . $gov[$i + 1] . "%'";
        else
            $addresses .= " OR T10_agency_info.address LIKE '%" . $gov[$i + 1] . "%'";
    }
}

if ($addresses != "") {
    $addresses .= ")";
    $term .= " AND " . $addresses;
}

$selectAges = "";
for ($i = 0; $i < 10; $i++) {
    $start = $i * 10;
    if ($i != 0)
        $start++;
    $end = $i * 10 + 10;
    $getAgeRange = "age_" . strval($start) . "_" . strval($end);

    if (isset($_GET[$getAgeRange])) {
        if ($selectAges == "")
            $selectAges .= "((T10_agency_info.start <= $end AND T10_agency_info.end >= $start)";
        else
            $selectAges .= " OR (T10_agency_info.start <= $end AND T10_agency_info.end >= $start)";
    }
}

if ($selectAges != "") {
    $selectAges .= ")";
    $term .= " AND " . $selectAges;
}

$care_type = "";
if (isset($_GET["day"])) {
    if ($care_type == "")
        $care_type .= "(T10_agency_info.care_type = 'day'";
    else
        $care_type .= " OR T10_agency_info.care_type = 'day'";
}
if (isset($_GET["stay"])) {
    if ($care_type == "")
        $care_type .= "(T10_agency_info.care_type = 'stay'";
    else
        $care_type .= " OR T10_agency_info.care_type = 'stay'";
}
if (isset($_GET["curing"])) {
    if ($care_type == "")
        $care_type .= "(T10_agency_info.care_type = 'curing'";
    else
        $care_type .= " OR T10_agency_info.care_type = 'curing'";
}

if ($care_type != "") {
    $care_type .= ")";
    $term .= " AND " . $care_type;
}
