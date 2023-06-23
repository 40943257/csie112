<?php
include('./layout/searchGet.php');
$pageSize = 4;

// 目前的頁碼
$page = 1;
if (isset($_GET['page']))
    $page = $_GET['page'];

$getParams = $_GET;
unset($getParams['page']);
$getParams = http_build_query($getParams);
if ($getParams)
    $getParams = '&' . $getParams;

$sql = "SELECT COUNT(*) as total FROM T10_agency_info";

if ($flag != "")
  $sql .= " INNER JOIN T10_cooperative ON T10_cooperative.id = T10_agency_info.id";

$sql .= " WHERE 1 = 1";

if ($term != "")
    $sql .= " AND " . $term;

if ($fileName == 'myAgency.php')
    $sql .= " AND T10_agency_info.account = '$account'";

if ($fileName == "view" || $fileName == "index.php")
    $sql .= " AND T10_agency_info.review = '1'";
  
$result = mysqli_query($conn, $sql);
$countRow = $result->fetch_assoc();
$totalCount = $countRow['total'];

// 計算總頁數
$totalPages = ceil($totalCount / $pageSize);
$startPage = max(1, $page - 2);
$endPage = min($totalPages, $page + 2);
?>

<div class="container">
    <form class="row g-3 d-flex align-items-center justify-content-center h-100" action="" method="get">
        <div class="dropdown col-auto">
            <button type="button" class="btn btn-primary dropdown-toggle mx-1 my-1" data-bs-toggle="dropdown" aria-expanded="false">
                類型
            </button>
            <ul class="dropdown-menu">
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="day" name="day">
                    <label class="form-check-label" for="dayShape">
                        日照型
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="stay" name="stay">
                    <label class="form-check-label" for="stay">
                        住宿型
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="curing" name="curing">
                    <label class="form-check-label" for="curing">
                        養護型
                    </label>
                </div>
            </ul>
        </div>

        <div class="dropdown col-auto">
            <button type="button" class="btn btn-primary dropdown-toggle mx-1 my-1" data-bs-toggle="dropdown" aria-expanded="false">
                長照對象
            </button>
            <ul class="dropdown-menu">
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="normal" name="normal">
                    <label class="form-check-label" for="normal">
                        一般人
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="unnormal" name="unnormal">
                    <label class="form-check-label" for="unnormal">
                        精神障礙
                    </label>
                </div>
            </ul>
        </div>

        <div class="dropdown col-auto">
            <button type="button" class="btn btn-primary dropdown-toggle mx-1 my-1" data-bs-toggle="dropdown" aria-expanded="false">
                縣市
            </button>
            <ul class="dropdown-menu">
                <?php
                for ($i = 0; $i < count($gov); $i += 2) {
                    echo "
                        <div class='form-check mx-1'>
                        <input class='form-check-input' type='checkbox' id='" . $gov[$i + 1] . "' name='" . $gov[$i + 1] . "'>
                        <label class='form-check-label' for='" . $gov[$i + 1] . "'>
                            " . $gov[$i] . "
                        </label>
                    </div>
                        ";
                }
                ?>
            </ul>
        </div>

        <!-- <div class="col-auto">
            <button type="button" class="btn btn-primary mx-1 my-1">
                地圖
            </button>
        </div> -->

        <div class="dropdown col-auto">
            <button type="button" class="btn btn-primary dropdown-toggle mx-1 my-1" data-bs-toggle="dropdown" aria-expanded="false">
                合作縣市
            </button>
            <ul class="dropdown-menu">
                <?php
                for ($i = 0; $i < count($gov); $i += 2) {
                    echo "
                        <div class='form-check mx-1'>
                        <input class='form-check-input' type='checkbox' id='with" . $gov[$i + 1] . "' name='with" . $gov[$i + 1] . "'>
                        <label class='form-check-label' for='with" . $gov[$i + 1] . "'>
                            " . $gov[$i] . "
                        </label>
                    </div>
                        ";
                }
                ?>
            </ul>
        </div>

        <div class="dropdown col-auto">
            <button type="button" class="btn btn-primary dropdown-toggle mx-1 my-1" data-bs-toggle="dropdown" aria-expanded="false">
                收治年紀
            </button>
            <ul class="dropdown-menu">
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_0_10" name="age_0_10">
                    <label class="form-check-label" for="age_0_10">
                        0~10
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_11_20" name="age_11_20">
                    <label class="form-check-label" for="age_11_20">
                        11~20
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_21_30" name="age_21_30">
                    <label class="form-check-label" for="age_21_30">
                        21~30
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_31_40" name="age_31_40">
                    <label class="form-check-label" for="age_31_40">
                        31~40
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_41_50" name="age_41_50">
                    <label class="form-check-label" for="age_41_50">
                        41~50
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_51_60" name="age_51_60">
                    <label class="form-check-label" for="age_51_60">
                        51~60
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_61_70" name="age_61_70">
                    <label class="form-check-label" for="age_61_70">
                        61~70
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_71_80" name="age_71_80">
                    <label class="form-check-label" for="age_71_80">
                        71~80
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_81_90" name="age_81_90">
                    <label class="form-check-label" for="age_81_90">
                        81~90
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="age_91_100" name="age_91_100">
                    <label class="form-check-label" for="age_91_100">
                        91~100
                    </label>
                </div>
            </ul>
        </div>

        <div class="dropdown col-auto">
            <button type="button" class="btn btn-primary dropdown-toggle mx-1 my-1" data-bs-toggle="dropdown" aria-expanded="false">
                價錢
            </button>
            <ul class="dropdown-menu">
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="h_less_200" name="h_less_200">
                    <label class="form-check-label" for="h_less_200">
                        每小時200以下
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="h_201_300" name="h_201_300">
                    <label class="form-check-label" for="h_201_300">
                        每小時201~300
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="h_301_400" name="h_301_400">
                    <label class="form-check-label" for="h_301_400">
                        每小時301~400
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="h_401_500" name="h_401_500">
                    <label class="form-check-label" for="h_401_500">
                        每小時401~500
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="h_more_500" name="h_more_500">
                    <label class="form-check-label" for="h_more_500">
                        每小時501以上
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_less_10000" name="m_less_10000">
                    <label class="form-check-label" for="m_less_10000">
                        每月10000以下
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_10001_15000" name="m_10001_15000">
                    <label class="form-check-label" for="m_10001_15000">
                        每月10001~15000
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_10001_15000" name="m_10001_15000">
                    <label class="form-check-label" for="m_10001_15000">
                        每月10001~15000
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_15001_20000" name="m_15001_20000">
                    <label class="form-check-label" for="m_15001_20000">
                        每月15001~20000
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_20001_25000" name="m_20001_25000">
                    <label class="form-check-label" for="m_20001_25000">
                        每月20001~25000
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_25001_30000" name="m_25001_30000">
                    <label class="form-check-label" for="m_25001_30000">
                        每月25001~30000
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="m_25001_30000" name="m_25001_30000">
                    <label class="form-check-label" for="m_more_30001">
                        每月30001以上
                    </label>
                </div>
            </ul>
        </div>

        <div class="col-auto">
            <input type="text" class="form-control mx-1  my-1" id="keywords" name="keywords" placeholder="關鍵字">
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mx-1  my-1">搜尋</button>
        </div>
    </form>
    <?php
    if ($isLogin) {
        if ($user == 'user') {
            if ($fileName == 'view' || $fileName == 'index.php')
                include('./layout/userIndexContent.php');
            else if ($fileName == 'myAgency.php') {
                include('./layout/rootIndex_agencyContent.php');
                echo '  
                <div class="mx-1 my-1 d-flex align-items-center justify-content-center h-100">
                    <button type="button" class="btn btn-success my-1" onclick="location.href=\'add\'">新增</button>
                </div>
            ';
            }
        } else if ($user == 'root') {
            if ($fileName == 'view' || $fileName == 'index.php') {
                include('./layout/rootIndex_agencyContent.php');
                echo '  
                <div class="mx-1 my-1 d-flex align-items-center justify-content-center h-100">
                    <button type="button" class="btn btn-success my-1" onclick="location.href=\'add\'">新增</button>
                </div>
            ';
            }
        }
    } else {
        include('./layout/userIndexContent.php');
    }
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php
                                    if ($page <= 1)
                                        echo ' disabled';
                                    ?>">
                <a class="page-link" href=<?= '?page=' . $page - 1 . $getParams; ?> tabindex="-1" aria-disabled="true">上一頁</a>
            </li>

            <?php
            for ($i = $startPage; $i <= $endPage && $i <= $totalPages; $i++) {
                echo '
                        <li class="page-item';
                if ($page == $i)
                    echo ' active';
                echo '">
                            <a class="page-link" href= "?page=' . $i . $getParams . '">' . $i . '</a>
                        </li>
                    ';
            }
            ?>

            <li class="page-item <?php
                                    if ($page >= $totalPages)
                                        echo ' disabled';
                                    ?>">
                <a class="page-link" href=<?= '?page=' . $page + 1 . $getParams; ?>>下一頁</a>
            </li>
        </ul>
    </nav>
</div>