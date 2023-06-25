<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!DOCTYPE html>
<html>

<head>
  <title>機頁頁面詳細</title>
  <style>
    headerr {
      /* 過去用頁首 */
      background-color: #0f94ed;
      color: #fff;
      padding: 10px;
    }
  </style>
</head>

<body >
  <header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('./layout/header.php');
    ?>
    <?php
      //connect to MySQL database
      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);       //i => improvement PDO => PHP Data Objects
      // Check connection
      if ($link->connect_error) {
        die("連接失敗： " . $conn->connect_error);
      }
      // getAgencyInfo(目標欄位名稱,目標機構名稱,資料表)
      function getAgencyInfo($info,$agencyName, $link) {
        $sql = "SELECT $info FROM T10_agency_info WHERE T10_agency_info.name = '$agencyName'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               echo " " . $row[$info] . " ";
            }
        }
      }    
      function getAgencygov($info,$agencyName, $link) {
        include('./layout/gov.php');
        $sql = "SELECT $info FROM T10_cooperative WHERE id = '$agencyName'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              for($i=0;$i<count($gov);$i++)
              {
                if($row[$info]==$gov[$i])
                {
                  echo " " . $gov[$i-1] . " ";
                }
              }
                // echo " " . $row[$info] . " ";
            }
        }
      }
      function getAgencycollect($info,$agencyName, $link) {
        $sql = "SELECT * FROM T10_agency_collect WHERE id = '$agencyName'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='row'>
            <div class='col  bg-info p-1 text-dark bg-opacity-10'>
              <p class=''>收治類型:";
              //////////////////顯示內容
              echo " " . $row[$info] . " ";
              echo " " . $row['money'] . " ";
              if($row['money_flag']=='1')
              {
                echo "/月";
              }
              else
              {
                echo "/天";
              }
              //////////////////
              echo  "</p>
                </div>
              </div>" ;
            }
        }    
      }
      global $commentresult;
      function wrstart($num_of_start) {
        $stars = str_repeat("★", $num_of_start);
        echo "<div class='col d-flex align-items-baseline'><h4>{$stars}</h4>";
      }
      function swapAgencycomment($agencyName, $link) {
        global $commentresult;
        $sql = "SELECT T10_comment.num_of_star,T10_comment.date,T10_comment.comment FROM T10_comment 
            WHERE T10_comment.id = '$agencyName'";
        $commentresult = $link->query($sql);
      }
      // 獲得機構名稱
      $agency_id = isset($_GET['id']) ? $_GET['id'] : 1;
      $sql = "SELECT name FROM T10_agency_info WHERE T10_agency_info.id = '  $agency_id'";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo " " . $row['name'] . " ";
              $post_agency=$row['name'];
          }
      }
      // $post_agency = '冒險者之家'; //過去初值設定

      //  getAgencycomment('comment');
      swapAgencycomment($post_agency, $link);
      ?>
  <!--                       頁首領域                -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </header>
  <div class="container" style="padding-top:1cm;">
    <div class="row">
      <div class="col-6 text-center ">
        <h3>機構圖片</h3>
        <div class="ratio ratio-16x9">
          <?php
            $sql = "SELECT main_image FROM T10_agency_info WHERE id = '$agency_id'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $priority=$row['main_image'];
                  echo "圖片名稱為{$priority}";
                } 
            }
          ?>
          <img id="img" class="img-fluid img-thumbnail" src="../image/agency/<?php echo $agency_id; ?>/<?php echo $priority; ?>.png" alt="機構沒圖片">
        </div>
        <!-- 頁數按鈕 -->
        <?php
        //獲取總筆數
          $fileContent = "D:/xampp/htdocs/agency/csie112-main/csie112-main/team10/image/agency/{$agency_id}/*.png";
          $fileContent = glob($fileContent);
          // 使用 for 迴圈遍歷檔案列表
          for ($i = 0; $i < count($fileContent); $i++) {
              $fcname = $fileContent[$i];
              $fcname = basename($fcname);
              echo $fcname;
          }
          $imgnum=count($fileContent);
          echo $priority;
        ?>
        <div id="pagination">
          <script>
            let totalCount =<?php echo $imgnum;?>;
            pagination = document.getElementById("pagination")
            for(i=1;i<=totalCount;i=i+1)
            {
              var pagibutton = document.createElement("button"); // 創建 <button> 元素
              pagibutton.textContent = i; // 設定按鈕內容為頁數
              pagibutton.classList.add("btn", "btn-outline-primary"); // 添加 CSS class
              pagibutton.onclick = function() {
                var img = document.getElementById("img")
                img.src = "../image/agency/"+<?php echo $agency_id; ?>+"/" + this.innerText + ".png";
              }
              pagination.appendChild(pagibutton); // 將按鈕添加到頁數按鈕容器中
            }
          </script>
        </div>
        <div class="container">
          <div class="row">
          <script>
            function new_or_better(num) {
              if(num==0)
              {
                window.location.href = 'detailed.php?page=1&id=<?php echo $agency_id; ?>';
              }
              else
              {
                window.location.href = 'detailed.php?page=1&id=<?php echo $agency_id;?>&new=0';
              }
            }
          </script> 
          <div class="col-6 d-flex justify-content-end">
            <input class="btn btn-primary" type="button" value="最新評論" onclick="new_or_better(0)">
          </div>
          <div class="col-6 d-flex justify-content-start">
            <input class="btn btn-primary" type="button" value="最好評論" onclick="new_or_better(1)">
          </div>
          </div>
          <!-- <div class="row  align-items-center">
            <div class="col-4">
              <img id="img" class="img-fluid img-thumbnail" src="./test.png" alt="機構沒圖片">
            </div>
            <div class="col-8">
              <div class="container">
              <div class="row">
                  <div class="row d-flex align-items-baseline">
                      comment
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            include "./layout/newcomment_creat.php"; 
          ?>
          <div class="row border border-dark">
            <div class="col">
              <form method="POST" action="testin.php">
                <div class="d-flex align-items-start p-1 starts">
                  <h3 id="start1">☆</h3>
                  <h3 id="start2">☆</h3>
                  <h3 id="start3">☆</h3>
                  <h3 id="start4">☆</h3>
                  <h3 id="start5">☆</h3>
                  <input type="hidden" name="num_of_start" id="num_of_start" value="5">
                  <input type="hidden" name="agency_name" id="agency_name" value="<?= $agency_id?>">
                  &nbsp;&nbsp;未評論為五顆星<br>
                  <!-- ★ -->
                </div>
                <div class="form-floating" style="position: relative;">
                  <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;"></textarea>
                  <label for="floatingTextarea2">寫評論?</label>
                  <button type="submit" style="position: absolute; bottom: 0; right: 0;">提交</button>
                </div>
             </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="row ">
          <div class="col  bg-info p-2 text-dark bg-opacity-25">
            <p class="">機構名稱:<?php getAgencyInfo("name",$post_agency,$link);?></p>
          </div>
        </div>
        <div class="row">
          <div class="col  bg-info p-2 text-dark bg-opacity-10">
            <p class="">地址:<?php getAgencyInfo("address",$post_agency,$link);?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-7  bg-info p-2 text-dark bg-opacity-25">
            <p class="">連絡電話:<?php getAgencyInfo("phone",$post_agency,$link);?></p>
          </div>
        </div>
        <?php getAgencycollect("admission_type",$agency_id,$link);?>

        <div class="row ">
          <div class="col-3  bg-info p-1 text-dark bg-opacity-25">
            <p class="">收治年紀:<?php getAgencyInfo("start",$post_agency,$link);?>-<?php getAgencyInfo("end",$post_agency,$link);?></p>
          </div>
          <div class="col-1 ">
          </div>
          <div class="col-3  bg-info p-1 text-dark bg-opacity-25">
            <p class="">收治人數:<?php getAgencyInfo("people",$post_agency,$link);?></p>
          </div>
        </div>
        <div class="row">
          <div class="col  bg-info p-2 text-dark bg-opacity-10">
            <p class="">縣市政府合作:<?php getAgencygov("government",$agency_id,$link);?></p>
          </div>
        </div>
        <div class="row" style="height: 300;">
          <div class="col  text-center bg-info p-2 text-dark bg-opacity-25">
            <p class="">詳細資訊:<br><?php getAgencyInfo("detailed",$post_agency,$link);?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    include('./layout/footer.php');
  ?>
</body>

</html>
<script>
  start_1 = document.getElementById("start1")
  start_2 = document.getElementById("start2")
  start_3 = document.getElementById("start3")
  start_4 = document.getElementById("start4")
  start_5 = document.getElementById("start5")
  let enableMouseEvents = true;
  let num_of_star=5
  //---分隔線滑鼠移動部分
  start_1.addEventListener("mouseover", function () {
    if (enableMouseEvents) {
      start_1.textContent = "★";
    }

  });
  start_1.addEventListener("mouseout", function () {
    if (enableMouseEvents) {
      start_1.textContent = "☆";
    }

  });
  start_2.addEventListener("mouseover", function () {
    if (enableMouseEvents) {
      start_1.textContent = "★";
      start_2.textContent = "★";
    }

  });
  start_2.addEventListener("mouseout", function () {
    if (enableMouseEvents) {
      start_1.textContent = "☆";
      start_2.textContent = "☆";
    }

  });
  start_3.addEventListener("mouseover", function () {
    if (enableMouseEvents) {
      start_1.textContent = "★";
      start_2.textContent = "★";
      start_3.textContent = "★";
    }


  });
  start_3.addEventListener("mouseout", function () {
    if (enableMouseEvents) {
      start_3.textContent = "☆";
      start_1.textContent = "☆";
      start_2.textContent = "☆";
    }

  });
  start_4.addEventListener("mouseover", function () {
    if (enableMouseEvents) {
      start_4.textContent = "★";
      start_1.textContent = "★";
      start_2.textContent = "★";
      start_3.textContent = "★";
    }

  });
  start_4.addEventListener("mouseout", function () {
    if (enableMouseEvents) {
      start_4.textContent = "☆";
      start_3.textContent = "☆";
      start_1.textContent = "☆";
      start_2.textContent = "☆";
    }

  });
  start_5.addEventListener("mouseover", function () {
    if (enableMouseEvents) {
      start_5.textContent = "★";
      start_4.textContent = "★";
      start_1.textContent = "★";
      start_2.textContent = "★";
      start_3.textContent = "★";
    }

  });
  start_5.addEventListener("mouseout", function () {
    if (enableMouseEvents) {
      start_5.textContent = "☆";
      start_4.textContent = "☆";
      start_3.textContent = "☆";
      start_1.textContent = "☆";
      start_2.textContent = "☆";
    }

  });
  //-------------分隔線點擊時
  start_1.addEventListener("click", function () {
    enableMouseEvents = false;
    start_1.textContent = "★";
    start_2.textContent = "☆";
    start_3.textContent = "☆";     
    start_4.textContent = "☆";
    start_5.textContent = "☆";
    num_of_star=1;
    document.getElementById("num_of_start").value = num_of_star;
  });
  start_2.addEventListener("click", function () {
    enableMouseEvents = false;
    start_1.textContent = "★";
    start_2.textContent = "★";
    start_3.textContent = "☆";     
    start_4.textContent = "☆";
    start_5.textContent = "☆";
    num_of_star=2
    document.getElementById("num_of_start").value = num_of_star;
  });
  start_3.addEventListener("click", function () {
    enableMouseEvents = false;
    start_1.textContent = "★";
    start_2.textContent = "★";
    start_3.textContent = "★";
    start_4.textContent = "☆";
    start_5.textContent = "☆";
    num_of_star=3
    document.getElementById("num_of_start").value = num_of_star;
  });
  start_4.addEventListener("click", function () {
    enableMouseEvents = false;
    start_4.textContent = "★";
    start_1.textContent = "★";
    start_2.textContent = "★";
    start_3.textContent = "★";
    start_5.textContent = "☆";
    num_of_star=4
    document.getElementById("num_of_start").value = num_of_star;
  });
  start_5.addEventListener("click", function () {
    enableMouseEvents = false;
    start_5.textContent = "★";
    start_4.textContent = "★";
    start_1.textContent = "★";
    start_2.textContent = "★";
    start_3.textContent = "★";
    num_of_star=5
    document.getElementById("num_of_start").value = num_of_star;
  });
</script>

<?php

// 關閉資料庫連接
$link->close();

echo "php end";
?>