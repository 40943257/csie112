<?php
// 計算資料的起始索引
$startIndex = ($page - 1) * $pageSize;

$sql = "SELECT id, name, address, detailed FROM T10_agency_info WHERE 1 = 1";

if ($fileName == 'myAgency.php')
  $sql .= " AND account = '$account'";
else 
  $sql .= " AND review = '1'";

if($term != "")
    $sql .= " AND " . $term;

$sql .= " ORDER BY id DESC LIMIT $startIndex, $pageSize";
$results = mysqli_query($conn, $sql);
foreach ($results as $result) {
  $id = $result["id"];
  $star = '無';
  $sql = "SELECT ROUND(AVG(num_of_star), 1) as average_star FROM T10_comment WHERE id = $id";
  $starResult = mysqli_query($conn, $sql);
  if ($starResult->num_rows > 0) {
    $starRow = $starResult->fetch_assoc();
    $star = $starRow["average_star"];
    if (!$star)
      $star = '無';
  }

  echo '
  <a href="detailed.php?id=' . $result["id"] . '">
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
            <p class="my-2">評價:' . $star . '</p>
          </div>  
          <div class="col-md col-11 mx-1 my-1 p-2 bg-primary bg-opacity-75 text-light">
            <p class="my-2 line-clamp-4">' . $result["detailed"] . '</p>
          </div>  
          <div class="col-md-1 col-12 mx-auto my-1 d-flex align-items-center justify-content-center">
              <button class="btn btn-success my-1" onclick="event.preventDefault(); location.href=\'edit.php?id=' . $result["id"] . '\'">編輯</button>
          </div>
        </div>
      </div>
    </div>
  </a>
';
}
