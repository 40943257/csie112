<?php
    $id = $_GET["id"];

    $sql_T10_agency_info = "SELECT * FROM T10_agency_info WHERE id = '$id'";                                  //找id相同的機構
    $result_T10_agency_info = mysqli_query($conn,$sql_T10_agency_info);
    $data_T10_agency_info   = mysqli_fetch_assoc($result_T10_agency_info);

    $sql_T10_agency_care_type = "SELECT * FROM T10_agency_care_type WHERE id = '$id'";                        //找id相同的機構
    $result_T10_agency_care_type = mysqli_query($conn,$sql_T10_agency_care_type);
    $store_care_type = array();                                                                 // 初始化 $store_care_type 為一個空陣列
    while ($data_T10_agency_care_type = mysqli_fetch_assoc($result_T10_agency_care_type)) {
        // echo $data_T10_agency_care_type["care_type"].'<br>';
        $store_care_type[] = $data_T10_agency_care_type["care_type"];               // 將 $data_T10_agency_care_type["care_type"] 存入 $store_care_type
    }

    $sql_T10_agency_collect = "SELECT * FROM T10_agency_collect WHERE id = '$id'";                            //找id相同的機構
    $result_T10_agency_collect = mysqli_query($conn,$sql_T10_agency_collect);
    $store_agency_collect = array();                                                                 // 初始化 $store_care_type 為一個空陣列
    while ($data_T10_agency_collect = mysqli_fetch_assoc($result_T10_agency_collect)) {
        $store_agency_collect[] = $data_T10_agency_collect["admission_type"];
        $store_agency_collect[] = $data_T10_agency_collect["money_flag"];
        $store_agency_collect[] = $data_T10_agency_collect["money"];
    }

    $sql_T10_cooperative = "SELECT * FROM T10_cooperative WHERE id = '$id'";                        //找id相同的機構
    $result_T10_cooperative = mysqli_query($conn,$sql_T10_cooperative);
    $store_cooperative = array();                                                                 // 初始化 $store_care_type 為一個空陣列
    while ($data_T10_cooperative = mysqli_fetch_assoc($result_T10_cooperative)) {
        $store_cooperative[] = $data_T10_cooperative["government"];
    }

    $name       = $data_T10_agency_info["name"];
    $phone      = $data_T10_agency_info["phone"];
    $address    = $data_T10_agency_info["address"];
    $start      = $data_T10_agency_info["start"];
    $end        = $data_T10_agency_info["end"];
    $people     = $data_T10_agency_info["people"];
    $detailed   = $data_T10_agency_info["detailed"];
?>
<div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
                <form method="post" action="myUpdateAgent.php" class="mb-3" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row mb-3">
                                                                                                            <!-- 機構名稱 -->
                        <div class="col">
                            <label for="name" class="form-label">機構名稱 <span>*</span></label>
                            <input type="text" class="form-control" name = "name" id="name" value="<?php echo $name;?>" required>
                        </div>
                                                                                                            <!-- 機構圖片 -->
                        <div class="col">
                            <label for="main_image" class="form-label">機構封面圖片 <span>*</span></label>
                            <input type="file" class="form-control" name="main_image" id="main_image" accept=".png, .jpg, .jpeg" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                                                                                                            <!-- 聯絡電話 -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">聯絡電話 <span>*</span></label>
                                <input type="tel" class="form-control" name = "phone" id="phone" value="<?php echo $phone;?>" required>
                            </div>
                                                                                                            <!-- 機構地址 -->
                            <div class="mb-3">
                                <label for="address" class="form-label">機構地址 <span>*</span></label>
                                <input type="text" class="form-control" name = "address" id="address" value="<?php echo $address;?>" required>
                            </div>
                            <div class="row mb-3">
                                                                                                            <!-- 類型 -->
                                <div class="col">
                                    <label class="form-label">類型 <span>*</span></label>
                                    <?php
                                                                                                                                    //類型
                                        $care_type = ['日照型','day','住宿型','stay','養護型','curing'];
                                        for($i=0; $i<count($care_type); $i+=2){                                            //count() 讀取大小
                                            $Ch = $care_type[$i];
                                            $En = $care_type[$i+1];
                                            echo '<div class="form-check">';
                                            echo    '<input class="form-check-input" type="checkbox" name="care_typeInput[]" value="'.$En.'" id="'.$En;
                                            $checkflag = 0;
                                            foreach($store_care_type as $stores){
                                                if($stores==$En){
                                                    echo '" checked>';
                                                    $checkflag = 1;
                                                    break;
                                                }
                                            }
                                            if(!$checkflag){
                                                echo '" >';
                                            }
                                            echo    '<label class="form-check-label" for="'.$En.'">';
                                            echo        $Ch;
                                            echo    '</label>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                                <div class="col">
                                                                                                            <!-- 長照對象 -->
                                    <label class="form-label">長照對象 <span>*</span></label>
                                    <?php
                                                                                                                                    //長照對象
                                        $admission_type = ['一般人','normal','精神障礙','unnormal'];
                                        for($i=0; $i<count($admission_type); $i+=2){                                            //count() 讀取大小
                                            $Ch = $admission_type[$i];
                                            $En = $admission_type[$i+1];
                                            echo '<div class="form-check">';
                                            echo    '<input class="form-check-input" type="checkbox" name="admission_typeInput[]" value="'.$En.'" id="'.$En;
                                            $checkflag = 0;
                                            for($j=0;$j<count($store_agency_collect);$j+=3){
                                                if($store_agency_collect[$j]==$En){
                                                    echo '" checked>';
                                                    $checkflag = 1;
                                                    break;
                                                }
                                            }
                                            if(!$checkflag){
                                                echo '" >';
                                            }
                                            echo    '<label class="form-check-label" for="'.$En.'">';
                                            echo        $Ch;
                                            echo    '</label>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                                                                                                            <!-- 最大最小收治年齡 -->
                            <div class="row mb-3">
                                <?php
                                                                                                                                    //年齡
                                    $age = ['最小收治年齡','start','最大收治年齡','end'];
                                    for($i=0; $i<count($age); $i+=2){                                            //count() 讀取大小
                                        $Ch = $age[$i];
                                        $En = $age[$i+1];
                                        echo '<div class="col">';
                                        echo    '<label for="'.$En.'" class="form-label">'.$Ch.' <span>*</span></label>';
                                        echo    '<input type="number" class="form-control" name = "'.$En.'" id="'.$En.'" value="'.$$En.'" required>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                                                                                                            <!-- 核准收容人數 -->                            
                            <div class="mb-3">
                                <label for="people" class="form-label">核准收容人數 <span>*</span></label>
                                <input type="number" class="form-control" name = "people" id="people" value="<?php echo $people;?>" required>
                            </div>
                                                                                                            <!-- 合作縣市政府 -->                            
                            <div class="mb-3">
                                <label class="form-label">合作縣市政府 <span>*</span></label>
                                <br>
                                <?php
                                    include './layout/gov.php';
                                                                                                                                    //政府
                                    for($i=0; $i<count($gov); $i+=2){                                            //count() 讀取大小
                                        $Ch = $gov[$i];
                                        $En = $gov[$i+1];
                                        echo '<div class="form-check form-check-inline">';
                                        echo    '<input class="form-check-input" type="checkbox" name="govInput[]" value="'.$En.'" id="gov'.$En;
                                        $checkflag = 0;
                                        foreach($store_cooperative as $stores){
                                            if($stores==$En){
                                                echo '" checked>';
                                                $checkflag = 1;
                                                break;
                                            }
                                        }
                                        if(!$checkflag){
                                            echo '" >';
                                        }
                                        echo    '<label class="form-check-label" for="gov'.$En.'">';
                                        echo        $Ch;
                                        echo    '</label>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <?php
                                                                                                                            //收費
                                for($i=0;$i<count($admission_type);$i+=2){
                                    $Ch = $admission_type[$i];
                                    $En = $admission_type[$i+1];

                                    $checkflag = 0;
                                    for($j=0;$j<count($store_agency_collect);$j+=3){
                                        if($store_agency_collect[$j]==$En){
                                            echo '<div class="mb-3" id="cost'.$En.'" style="">';
                                            echo    '<label class="form-label">'.$Ch.'收費<span> *</span></label>';
                                            echo    '<div class="row mb-3">';
                                            echo        '<div class="col">';
                                            echo            '<input type="number" class="form-control" name = "h_'.$En.'" placeholder="每小時收費" value="'.$store_agency_collect[$j+2].'">';
                                            echo        '</div>';
                                            echo        '<div class="col">';
                                            echo            '<input type="number" class="form-control" name = "m_'.$En.'" placeholder="每月收費" value="'.$store_agency_collect[$j+5].'">';
                                            echo        '</div>';
                                            echo    '</div>';
                                            echo '</div>';
                                            $checkflag = 1;
                                            break;
                                        }
                                    }
                                    if(!$checkflag){
                                        echo '<div class="mb-3" id="cost'.$En.'" style="display:none;">';
                                        echo    '<label class="form-label">'.$Ch.'收費<span> *</span></label>';
                                        echo    '<div class="row mb-3">';
                                        echo        '<div class="col">';
                                        echo            '<input type="number" class="form-control" name = "h_'.$En.'" placeholder="每小時收費">';
                                        echo        '</div>';
                                        echo        '<div class="col">';
                                        echo            '<input type="number" class="form-control" name = "m_'.$En.'" placeholder="每月收費">';
                                        echo        '</div>';
                                        echo    '</div>';
                                        echo '</div>';
                                    }                                    
                                }                                
                            ?>
                            <div class="mb-3">
                                <label for="image_src" class="form-label">機構圖片 <span>*</span></label>
                                <input type="file" class="form-control" name="image_src[]" id="image_src" accept=".png, .jpg, .jpeg" multiple required>
                            </div>
                                                                                                            <!-- 詳細描述 -->                            
                            <div class="mb-3">
                                <label for="detailed" class="form-label">詳細描述</label>
                                <textarea class="form-control" name = "detailed" id="detailed" rows="3"><?php echo $detailed;?></textarea>
                            </div>
                        </div>
                    </div><!--end of row-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>