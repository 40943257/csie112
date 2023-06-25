<?php
// 計算資料的起始索引
$startIndex = ($page - 1) * $pageSize;

$sql = "SELECT T10_agency_info.id, T10_agency_info.name, T10_agency_info.address, T10_agency_info.detailed, T10_agency_info.review";
if ($selectWithGov != "")
  $sql .= ", GROUP_CONCAT(T10_cooperative.government SEPARATOR ', ') AS governments";

$sql .= " FROM T10_agency_info";

if ($selectWithGov != "")
  $sql .= " INNER JOIN T10_cooperative ON T10_cooperative.id = T10_agency_info.id";

if ($admission_types != "" || $moneys != "")
  $sql .= " INNER JOIN T10_agency_collect ON T10_agency_collect.id = T10_agency_info.id";
  
$sql .= " WHERE 1 =1";

if ($term != "")
  $sql .= " AND " . $term;

if ($selectWithGov != "" || $admission_types != "")
  $sql .= " GROUP By T10_agency_info.id, T10_agency_info.name, T10_agency_info.address, T10_agency_info.detailed, T10_agency_info.main_image";

$sql .= " ORDER BY T10_agency_info.id DESC LIMIT $startIndex, $pageSize";
$results = mysqli_query($conn, $sql);

foreach ($results as $result) {
  $isChecked = false;
  $review = $result["review"];
  $ansaa = $result["review"];
  $id = $result["id"];
  $star = '無';
  $value="value";
  $ansaa=$result["review"];
  $sql = "SELECT ROUND(AVG(num_of_star), 1) as average_star FROM T10_comment WHERE id = $id";
  $starResult = mysqli_query($conn, $sql);
  if ($starResult->num_rows > 0) {
    $starRow = $starResult->fetch_assoc();
    $star = $starRow["average_star"];
    if (!$star)
      $star = '無';
  }

  $sql = "SELECT review FROM T10_agency_info";
    $resulta = $conn->query($sql);
      if ($resulta->num_rows > 0) {
        $row = $resulta->fetch_assoc();
  $isChecked = (bool) $row['review'];
  }
  echo ' 
      <div class="row mx-1 my-1 border border-dark d-flex align-items-center justify-content-center">
        <div class="col-md-2 col-12">
            <div class="ratio ratio-16x9">
              <img class="bg-secondary">
            </div>
        </div>
        <div class="col-md-10 col-12">
          <div class="row bg-info mx-auto my-1 justify-content-center">
            <div class="col-md-2 col-11 mx-1 my-1 p-2 bg-primary bg-opacity-75 text-light text-truncate">
              <p class="my-2">機構名稱:' . $result["name"] . '</p>
              <p class="my-2">地址:' . $result["address"] . '</p>
            </div>  
            <div class="col-md col-12 mx-1 my-1 p-2 bg-primary bg-opacity-75 text-light d-flex align-items-stretch">
              <p class="my-2 line-clamp-4">' . $result["detailed"] . '</p>
            </div>
         ';
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST["$id"])==true){
             $ansaa = trim($_POST["$id"]);
              $id = $_POST["id"];
             // echo "$id";
              $sql_query= "UPDATE T10_agency_info set review = '$ansaa' where id= '$id' ";
              $result = mysqli_query($link, $sql_query);
          }}
         echo'
            <form name="table" method="post" >
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" name="' . $id . '" ' . ($ansaa ? '' : 'checked review="0"') . ' >
              <label class="form-check-label" for="flexRadioDefault1">
                未審核
             </label>
            </div>
              <div class="form-check">
              <input class="form-check-input" type="radio" value="1"name="' . $id . '" ' . ($ansaa ? 'checked review="1"' : '') . ' >
              <label class="form-check-label" >
                已審核
            </label>';
            
            
              echo'
            </div>
            <div class="form-button ">
                    <button type="sudmit" class="btn btn-success my-1" name="write" >更改</button>
                    </div>
                      <input name="id" value="' . $id . '" type="hidden"> 
            </form>
          </div>
        </div>
      </div>
  ';
  //onclick="location.href=\'test2.php\'"action="test2.php"
}?>

<?php

?>



