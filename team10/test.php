<?php
// 資料庫連線設定
$servername = "localhost:3307";
$username = "root";
$password = "304db";
$dbname = "csie112";

// 建立資料庫連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}

// 要插入的資料筆數
$numRecords = 50;

// 使用迴圈插入資料
for ($i = 1; $i <= $numRecords; $i++) {
    // 生成隨機資料
    $name = "Agency " . $i;
    $address = "Address " . $i;
    $phone = mt_rand(1000000000, 9999999999);
    $start = mt_rand(1, 100);
    $end = mt_rand($start + 1, 200);
    $people = mt_rand(1, 10);
    $detailed = "Detailed info for Agency " . $i;
    $imageSrc = "image" . $i . ".jpg";
    $review = mt_rand(0, 1);
    $account = "account" . $i;

    // 建立插入資料的SQL語句
    $sql = "INSERT INTO t10_agency_info (name, address, phone, start, end, people, detailed, image_src, review, account) 
            VALUES ('$name', '$address', '$phone', '$start', '$end', '$people', '$detailed', '$imageSrc', '$review', '$account')";

    // 執行插入資料的SQL語句
    if ($conn->query($sql) === TRUE) {
        echo "成功插入第 $i 筆資料<br>";
    } else {
        echo "插入資料時發生錯誤: " . $conn->error;
    }
}

// 關閉資料庫連線
$conn->close();
?>
