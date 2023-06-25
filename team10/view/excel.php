<?php
$conn = require_once "./layout/config.php";
include('./layout/gov.php');

session_start();

//true | false
$isLogin = false;
$user = 'user';
if (isset($_SESSION["account"])) {
    $isLogin = true;
    if ($_SESSION["account"] == 'admin304') {
        $user = 'admin304';
    }
    $account = $_SESSION["account"];
}

// 獲取當前網址
$currentUrl = $_SERVER['REQUEST_URI'];

// 解析網址
$parsedUrl = parse_url($currentUrl);

// 檢查是否存在查詢參數
$queryParams = [];
if (isset($parsedUrl['query'])) {
    // 解析查詢參數
    parse_str($parsedUrl['query'], $queryParams);
}

// 刪除 'page' 參數
unset($queryParams['page']);

// 重新構建網址
$newQuery = http_build_query($queryParams);
$newUrl = $parsedUrl['path'];

// 提取文件名
$fileName = pathinfo($parsedUrl['path'], PATHINFO_BASENAME);
// echo $fileName;
$newUrl .= '?' . $newQuery;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../script/script.js"></script>
    <style>
    
    body {
      margin-top: 10px;
      text-align: center;
    }
    h1 {
      background-color: #0d6efd; 
      
    }
    button{border:0;
     background-color:#0d6efd;
    color:#000;
    border-radius:10px;
    cursor:pointer;}

    button:hover{
    color:#0d6efd;
    background-color:#fff;
    border:2px #0d6efd solid;
    }


    input{border:0;
     background-color:#0d6efd;
    color:#000;
    border-radius:20px;
    cursor:pointer;}

    input:hover{
    color:#0d6efd;
    background-color:#fff;
    border:2px #0d6efd solid;
    }
    
    
    
  </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary z_index_1032">
        <a class="navbar-brand mx-1 my-1" href="." id="front">首頁</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if ($isLogin) {
                    echo '<li class="nav-item">';
                    echo '<a class="btn btn-primary mx-1 my-1';
                    if ($fileName == 'myAgency.php')
                        echo ' active';
                    echo '" href="./myAgency.php" id="myAgency">我的機構</a>';
                    echo '</li>';
                    if ($user == 'admin304') {
                        echo '<li class="nav-item">';
                        echo '<a class="btn btn-primary mx-1 my-1';
                        if ($fileName == 'reviewAgency.php')
                            echo ' active';
                        echo '" href="reviewAgency.php" id="check">審核</a>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="btn btn-primary mx-1 my-1';
                        if ($fileName == 'excel.php')
                            echo ' active';
                        echo '" href="excel.php" id="excelImport">excel匯入資料</a>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
            <ul class="navbar-nav">
                <?php
                if ($isLogin) {
                    if ($user == 'user') {
                        echo '<li class="nav-item">';
                        echo '<a class="btn btn-primary mx-1 my-1';
                        if ($fileName == 'userInfo.php')
                            echo ' active';
                        echo '" href="userInfo.php" id="userInfo.php">個人資訊</a>';
                        echo '</li>';
                    }
                    echo '<li class="nav-item">';
                    echo '<a class="btn btn-primary mx-1 my-1" href="logout.php" id="logout">登出</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '<a class="btn btn-primary mx-1 my-1';
                    if ($fileName == 'loginPage.php')
                        echo ' active';
                    echo '" href="loginPage.php" id="loginPage">登入</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                    echo '<a class="btn btn-primary mx-1 my-1';
                    if ($fileName == 'signupPage.php')
                        echo ' active';
                    echo '" href="signupPage.php" id="signupPage">創建帳號</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>

<?php
include('./layout/excel.php');
?>

<?php
include('./layout/footer.php');
?>