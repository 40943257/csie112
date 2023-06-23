<?php
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

$sql = "SELECT COUNT(*) as total FROM T10_agency_info WHERE 1 = 1";
include('./layout/searchGet.php');

if($term != "")
    $sql .= " AND " . $term;

if($fileName == 'myAgency.php')
    $sql .= " AND account = '$account'";

if($fileName == "view" || $fileName == "index.php")
    $sql .= " AND review = '1'";

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
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="KeelungCity" name="KeelungCity">
                    <label class="form-check-label" for="KeelungCity">
                        基隆市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="NewTaipeiCity" name="NewTaipeiCity">
                    <label class="form-check-label" for="NewTaipeiCity">
                        新北市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="TaipeiCity" name="TaipeiCity">
                    <label class="form-check-label" for="TaipeiCity">
                        台北市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="TaoyuanCity" name="TaoyuanCity">
                    <label class="form-check-label" for="TaoyuanCity">
                        桃園市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="HsinchuCounty" name="HsinchuCounty">
                    <label class="form-check-label" for="HsinchuCounty">
                        新竹縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="HsinchuCity" name="HsinchuCity">
                    <label class="form-check-label" for="HsinchuCity">
                        新竹市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="MiaoliCity" name="MiaoliCity">
                    <label class="form-check-label" for="MiaoliCity">
                        苗栗市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="MiaoliCounty" name="MiaoliCounty">
                    <label class="form-check-label" for="MiaoliCounty">
                        苗栗縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="TaichungCity" name="TaichungCity">
                    <label class="form-check-label" for="TaichungCity">
                        台中市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="ChanghuaCounty" name="ChanghuaCounty">
                    <label class="form-check-label" for="ChanghuaCounty">
                        彰化縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="ChanghuaCity" name="ChanghuaCity">
                    <label class="form-check-label" for="ChanghuaCity">
                        彰化市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="NantouCity" name="NantouCity">
                    <label class="form-check-label" for="NantouCity">
                        南投市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="NantouCounty" name="NantouCounty">
                    <label class="form-check-label" for="NantouCounty">
                        南投縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="YunlinCounty" name="YunlinCounty">
                    <label class="form-check-label" for="YunlinCounty">
                        雲林縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="ChiayiCounty" name="ChiayiCounty">
                    <label class="form-check-label" for="ChiayiCounty">
                        嘉義縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="ChiayiCity" name="ChiayiCity">
                    <label class="form-check-label" for="ChiayiCity">
                        嘉義市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="TainanCity" name="TainanCity">
                    <label class="form-check-label" for="TainanCity">
                        台南市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="KaohsiungCity" name="KaohsiungCity">
                    <label class="form-check-label" for="KaohsiungCity">
                        高雄市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="PingtungCounty" name="PingtungCounty">
                    <label class="form-check-label" for="PingtungCounty">
                        屏東縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="PingtungCity" name="PingtungCity">
                    <label class="form-check-label" for="PingtungCity">
                        屏東市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="YilanCounty" name="YilanCounty">
                    <label class="form-check-label" for="YilanCounty">
                        宜蘭縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="YilanCity" name="YilanCity">
                    <label class="form-check-label" for="YilanCity">
                        宜蘭市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="HualienCounty" name="HualienCounty">
                    <label class="form-check-label" for="HualienCounty">
                        花蓮縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="HualienCity" name="HualienCity">
                    <label class="form-check-label" for="HualienCity">
                        花蓮市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="TaitungCity" name="TaitungCity">
                    <label class="form-check-label" for="TaitungCity">
                        台東市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="TaitungCounty" name="TaitungCounty">
                    <label class="form-check-label" for="TaitungCounty">
                        台東縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="PenghuCounty" name="PenghuCounty">
                    <label class="form-check-label" for="PenghuCounty">
                        澎湖縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="KinmenCounty" name="KinmenCounty">
                    <label class="form-check-label" for="KinmenCounty">
                        金門縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="Matsu" name="Matsu">
                    <label class="form-check-label" for="Matsu">
                        馬祖
                    </label>
                </div>
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
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withKeelungCity" name="withKeelungCity">
                    <label class="form-check-label" for="withKeelungCity">
                        基隆市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withNewTaipeiCity" name="withNewTaipeiCity">
                    <label class="form-check-label" for="withNewTaipeiCity">
                        新北市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withTaipeiCity" name="withTaipeiCity">
                    <label class="form-check-label" for="withTaipeiCity">
                        台北市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withTaoyuanCity" name="withTaoyuanCity">
                    <label class="form-check-label" for="withTaoyuanCity">
                        桃園市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withHsinchuCounty" name="withHsinchuCounty">
                    <label class="form-check-label" for="withHsinchuCounty">
                        新竹縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withHsinchuCity" name="withHsinchuCity">
                    <label class="form-check-label" for="withHsinchuCity">
                        新竹市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withMiaoliCity" name="withMiaoliCity">
                    <label class="form-check-label" for="withMiaoliCity">
                        苗栗市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withMiaoliCounty" name="withMiaoliCounty">
                    <label class="form-check-label" for="withMiaoliCounty">
                        苗栗縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withTaichungCity" name="withTaichungCity">
                    <label class="form-check-label" for="withTaichungCity">
                        台中市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withChanghuaCounty" name="withChanghuaCounty">
                    <label class="form-check-label" for="withChanghuaCounty">
                        彰化縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withChanghuaCity" name="withChanghuaCity">
                    <label class="form-check-label" for="withChanghuaCity">
                        彰化市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withNantouCity" name="withNantouCity">
                    <label class="form-check-label" for="withNantouCity">
                        南投市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withNantouCounty" name="withNantouCounty">
                    <label class="form-check-label" for="withNantouCounty">
                        南投縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withYunlinCounty" name="withYunlinCounty">
                    <label class="form-check-label" for="withYunlinCounty">
                        雲林縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withChiayiCounty" name="withChiayiCounty">
                    <label class="form-check-label" for="withChiayiCounty">
                        嘉義縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withChiayiCity" name="withChiayiCity">
                    <label class="form-check-label" for="withChiayiCity">
                        嘉義市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withTainanCity" name="withTainanCity">
                    <label class="form-check-label" for="withTainanCity">
                        台南市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withKaohsiungCity" name="withKaohsiungCity">
                    <label class="form-check-label" for="withKaohsiungCity">
                        高雄市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withPingtungCounty" name="withPingtungCounty">
                    <label class="form-check-label" for="withPingtungCounty">
                        屏東縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withPingtungCity" name="withPingtungCity">
                    <label class="form-check-label" for="withPingtungCity">
                        屏東市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withYilanCounty" name="withYilanCounty">
                    <label class="form-check-label" for="withYilanCounty">
                        宜蘭縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withYilanCity" name="withYilanCity">
                    <label class="form-check-label" for="withYilanCity">
                        宜蘭市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withHualienCounty" name="withHualienCounty">
                    <label class="form-check-label" for="withHualienCounty">
                        花蓮縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withHualienCity" name="withHualienCity">
                    <label class="form-check-label" for="withHualienCity">
                        花蓮市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withTaitungCity" name="withTaitungCity">
                    <label class="form-check-label" for="withTaitungCity">
                        台東市
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withTaitungCounty" name="withTaitungCounty">
                    <label class="form-check-label" for="withTaitungCounty">
                        台東縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withPenghuCounty" name="withPenghuCounty">
                    <label class="form-check-label" for="withPenghuCounty">
                        澎湖縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withKinmenCounty" name="withKinmenCounty">
                    <label class="form-check-label" for="withKinmenCounty">
                        金門縣
                    </label>
                </div>
                <div class="form-check mx-1">
                    <input class="form-check-input" type="checkbox" id="withMatsu" name="withMatsu">
                    <label class="form-check-label" for="withMatsu">
                        馬祖
                    </label>
                </div>
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