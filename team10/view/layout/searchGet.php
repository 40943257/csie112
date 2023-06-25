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
            $addresses .= "(T10_agency_info.address LIKE '%" . $gov[$i] . "%'";
        else
            $addresses .= " OR T10_agency_info.address LIKE '%" . $gov[$i] . "%'";
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

$care_types = "";
if (isset($_GET["day"])) {
    if ($care_types == "")
        $care_types .= "(T10_agency_care_type.care_type = 'day'";
    else
        $care_types .= " OR T10_agency_care_type.care_type = 'day'";
}
if (isset($_GET["stay"])) {
    if ($care_types == "")
        $care_types .= "(T10_agency_care_type.care_type = 'stay'";
    else
        $care_types .= " OR T10_agency_care_type.care_type = 'stay'";
}
if (isset($_GET["curing"])) {
    if ($care_types == "")
        $care_types .= "(T10_agency_care_type.care_type = 'curing'";
    else
        $care_types .= " OR T10_agency_care_type.care_type = 'curing'";
}

if ($care_types != "") {
    $care_types .= ")";
    $term .= " AND " . $care_types;
}

$admission_types = "";
if (isset($_GET["normal"])) {
    if ($admission_types == "")
        $admission_types .= "(T10_agency_collect.admission_type = 'normal'";
    else
        $admission_types .= " OR T10_agency_collect.admission_type = 'normal'";
}
if (isset($_GET["unnormal"])) {
    if ($admission_types == "")
        $admission_types .= "(T10_agency_collect.admission_type = 'unnormal'";
    else
        $admission_types .= " OR T10_agency_collect.admission_type = 'unnormal'";
}

if ($admission_types != "") {
    $admission_types .= ")";
    $term .= " AND " . $admission_types;
}

$moneys = "";
for ($i = 200; $i <= 600; $i += 100) {
    $min = 0;
    $max = 0;
    if ($i == 200) {
        $min = "less";
        $max = 200;
    } else if ($i == 600) {
        $min = "more";
        $max = 501;
    } else {
        $min = $i - 99;
        $max = $i;
    }
    $moneyGet = "h_" . $min . "_" . $max;
    if (isset($_GET[$moneyGet])) {
        if ($moneys == "") {
            if ($min == "less")
                $moneys .= "((T10_agency_collect.money_flag = 0 AND T10_agency_collect.money <= $max)";
            else if ($min == "more")
                $moneys .= "((T10_agency_collect.money_flag = 0 AND T10_agency_collect.money >= $max)";
            else
                $moneys .= "((T10_agency_collect.money_flag = 0 AND T10_agency_collect.money >= $min AND T10_agency_collect.money <= $max)";
        } else {
            if ($min == "less")
                $moneys .= " OR (T10_agency_collect.money_flag = 0 AND T10_agency_collect.money <= $max)";
            else if ($min == "more")
                $moneys .= " OR (T10_agency_collect.money_flag = 0 AND T10_agency_collect.money >= $max)";
            else
                $moneys .= " OR (T10_agency_collect.money_flag = 0 AND T10_agency_collect.money >= $min AND T10_agency_collect.money <= $max)";
        }
    }
}
for ($i = 10000; $i <= 35000; $i += 5000) {
    $min = 0;
    $max = 0;
    if ($i == 10000) {
        $min = "less";
        $max = 10000;
    } else if ($i == 35000) {
        $min = "more";
        $max = 30001;
    } else {
        $min = $i - 4999;
        $max = $i;
    }
    $moneyGet = "m_" . $min . "_" . $max;
    if (isset($_GET[$moneyGet])) {
        if ($moneys == "") {
            if ($min == "less")
                $moneys .= "((T10_agency_collect.money_flag = 1 AND T10_agency_collect.money <= $max)";
            else if ($min == "more")
                $moneys .= "((T10_agency_collect.money_flag = 1 AND T10_agency_collect.money >= $max)";
            else
                $moneys .= "((T10_agency_collect.money_flag = 1 AND T10_agency_collect.money >= $min AND T10_agency_collect.money <= $max)";
        } else {
            if ($min == "less")
                $moneys .= " OR (T10_agency_collect.money_flag = 1 AND T10_agency_collect.money <= $max)";
            else if ($min == "more")
                $moneys .= " OR (T10_agency_collect.money_flag = 1 AND T10_agency_collect.money >= $max)";
            else
                $moneys .= " OR (T10_agency_collect.money_flag = 1 AND T10_agency_collect.money >= $min AND T10_agency_collect.money <= $max)";
        }
    }
}

if ($moneys != "") {
    $moneys .= ")";
    $term .= " AND " . $moneys;
}
