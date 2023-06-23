<?php
$term = "";
$keywords = "";
if (isset($_GET["keywords"]))
    $keywords = $_GET["keywords"];
$term .= "(T10_agency_info.name LIKE '%$keywords%' OR T10_agency_info.address LIKE '%$keywords%' OR T10_agency_info.detailed LIKE '%$keywords%')";

$flag = "";
for ($i = 0; $i < count($gov); $i += 2) {
    $gov2 = ucfirst($gov[$i + 1]);
    if(isset($_GET["with" . $gov2])) {
        if($flag == "")
            $flag .= "(T10_cooperative.government = '" . $gov[$i + 1] . "'";
        else 
            $flag .= " OR T10_cooperative.government = '" . $gov[$i + 1] . "'";
    }
}

if($flag != "") {
    $flag .= ")";
    $term .= " AND " . $flag;
}
