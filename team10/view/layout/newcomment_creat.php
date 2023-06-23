<?php
// // 建立與資料庫的連接
// define('DB_SERVER', 'localhost');           //define('常數名稱','常數值'); refence:P6-2
// define('DB_USERNAME', 'detailed_agency');
// define('DB_PASSWORD', 'detailed_agency');                  //default NULL
// define('DB_NAME', 'database_hw');

// // 創建連接
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);       //i => improvement PDO => PHP Data Objects
  
// // 檢查連接是否成功
// if ($link->connect_error) {
//     die("連接資料庫失敗: " . $link->connect_error);
// }
// 處理當前頁數
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$agency_id = isset($_GET['id']) ? $_GET['id'] : 1;
$new_comment = isset($_GET['new']) ? $_GET['new'] : 1;
$itemsPerPage = 2;
$offset = ($page - 1) * $itemsPerPage;
//獲取總筆數
$totalCountQuery = "SELECT COUNT(*) AS total FROM T10_comment WHERE id = $agency_id";
$totalCountResult = $link->query($totalCountQuery);
$totalCountRow = $totalCountResult->fetch_assoc();
$totalCount = $totalCountRow['total'];
$totalPages = ceil($totalCount / $itemsPerPage);
// 限制查詢結果
if($new_comment==0)
{
  $query = "SELECT * FROM T10_comment inner join T10_user on T10_comment.account = T10_user.account WHERE id = $agency_id ORDER BY num_of_star DESC LIMIT $offset, $itemsPerPage ";//改機構位置
}
else
{
  $query = "SELECT * FROM T10_comment inner join T10_user on T10_comment.account = T10_user.account WHERE id = $agency_id ORDER BY date DESC LIMIT $offset, $itemsPerPage ";//改機構位置
}
$result = $link->query($query);
/*過去圖片紀錄      <div class='col-4'>
      <img id='img' class='img-fluid img-thumbnail h-auto w-80 ' src='./test{$page}.png' alt='使用者沒圖片'>
      </div>*/

  // 顯示資料
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      //--------------------------
      echo "<div class='row  align-items-center'>
      <div class='col-12'>
        <div class='container'>
          <div class='row'>
            <div class='row d-flex align-items-baseline '>
            <div class='d-flex align-items-baseline '>{$row['name']}這似乎是人名</div>";
      // echo "<p>{$row['user_id']}</p>";
      wrstart($row['num_of_star']); // 輸出：★★★★★
      echo " " . date('Y-m-d', strtotime($row['date'])) . "</div> 
      <div class='d-flex align-items-baseline text-break'>
      {$row['comment']}</div>";
      // echo "<p>{$row['date']}</p>";
      // echo "<p>{$row['comment']}</p>";
            echo "
            </div>
          </div>
        </div>
      </div>
      </div>
      <br>";
  }
} else {
  echo "沒有資料{$totalCount}";
}
  // 顯示上下頁按鈕
if ($totalPages > 1) {
  echo "<div>";
  if ($page > 1) {
      $prevPage = $page - 1;
      echo "<button onclick=\"location.href='detailed.php?page=$prevPage&id=$agency_id&new=$new_comment'\" class='btn btn-primary'>上一頁</button>";
      // echo "<a href='detailed.php?page=$prevPage'>上一頁</a>";    todo style='padding-right:1cm;
  }
  if ($page < $totalPages) {
      $nextPage = $page + 1;
      echo "<button onclick=\"location.href='detailed.php?page=$nextPage&id=$agency_id&new=$new_comment'\" class='btn btn-primary '>下一頁</button>";
  }
  echo "</div>";
}
// 關閉資料庫連接
// $link->close();
?>

          