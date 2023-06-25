<?php
session_start();
$conn=require_once "./layout/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $account = $_SESSION["account"];

    $name=$_POST["name"];                                       //機構名稱
    $phone=$_POST["phone"];                                     //聯絡電話
    $address=$_POST["address"];                                 //機構地址
                                                                //類型
    $care_type = ['日照型','day','住宿型','stay','養護型','curing'];
    if(isset($_POST['care_typeInput']))
        $care_typeInput = $_POST['care_typeInput'];
                                                                //長照對象
    $admission_type = ['一般人','normal','精神障礙','unnormal'];
    if(isset($_POST['admission_typeInput']))
        $admission_typeInput = $_POST['admission_typeInput'];
    $start=$_POST["start"];$end=$_POST["end"];                  //最小最大年齡
    $people=$_POST["people"];                                   //核准收容人數
    include './layout/gov.php';                                 //政府
    $gov;
    if(isset($_POST['govInput']))
        $govInput = $_POST['govInput'];
    $detailed=$_POST["detailed"];                               //詳細描述

    echo "$id<br>";
    echo "機構名稱: $name <br>";
    echo "聯絡電話: $phone <br>";
    echo "機構地址: $address <br>";

    if(isset($care_typeInput)){
        echo "類型:<br>";
        foreach($care_typeInput as $care_typeSelect){
            echo "&emsp;{$care_typeSelect}<br>";
        }    
    }else{
        echo "沒有選擇類型<br>";
    }

    if(isset($admission_typeInput)){
        echo "長照對象:<br>";
        $store_admission_typeInput = array();
        foreach($admission_typeInput as $admission_typeSelect){
            $store_admission_typeInput[] = $admission_typeSelect;
            echo "&emsp;{$admission_typeSelect}<br>";
        }    
    }else{
        echo "沒有選擇長照對象<br>";
    }

    if(isset($govInput)){
        echo "政府:<br>";
        foreach($govInput as $govInputSelect){
            echo "&emsp;{$govInputSelect}<br>";
        }    
    }else{
        echo "沒有選擇政府<br>";
    }

    echo "最小年齡: $start 最大年齡: $end <br>";
    echo "核准收容人數: $people <br>";

    for($i=1;$i<count($admission_type);$i+=2){
        $admission_typeH = "h_{$admission_type["$i"]}";             //h_$English
        $admission_typeM = "m_{$admission_type["$i"]}";             //m_$English

        if(!empty($_POST["$admission_typeH"])){
            $$admission_typeH = $_POST["$admission_typeH"];
            echo "{$admission_typeH}:{$$admission_typeH}<br>";
        }
        if(!empty($_POST["$admission_typeM"])){
            $$admission_typeM = $_POST["$admission_typeM"];
            echo "{$admission_typeM}:{$$admission_typeM}<br>";
        }
    }

    echo "詳細描述: $detailed <br>";
                                                                    //T10_agency_info
    $sql_T10_agency_info = "UPDATE T10_agency_info SET account = '{$account}', name = '{$name}', address = '{$address}', phone = '{$phone}', 
                                                        start = '{$start}', end = '{$end}', people = '{$people}', detailed = '{$detailed}'
                                                    WHERE id = '{$id}'";
    if(mysqli_query($conn,$sql_T10_agency_info)){   //檢查錯誤
        echo "成功UPDATE T10_agency_info!<br>";
    }
    else{                                           //有誤
        //echo "無法INSERT INTO T10_agency_info!<br>"; 
        echo mysqli_error($conn);
        function_alert('無法UPDATE T10_agency_info!<br>');
    }

                                                                    //T10_agency_care_type
    if(isset($care_typeInput)){
        $sql_delete_care_type = "DELETE FROM T10_agency_care_type WHERE id = '{$id}'";
        if(!mysqli_query($conn,$sql_delete_care_type)){   //檢查錯誤
            echo mysqli_error($conn);
            function_alert('無法DELETE T10_agency_care_type!<br>');
        }
        foreach($care_typeInput as $care_typeSelect){
            $sql_T10_agency_care_type = "INSERT INTO T10_agency_care_type (id, care_type)
                                            VALUES ('{$id}', '{$care_typeSelect}')";
            if(mysqli_query($conn,$sql_T10_agency_care_type)){   //檢查錯誤
                echo "成功INSERT INTO T10_agency_care_type!<br>";
            }
            else{                                               //有誤
                echo mysqli_error($conn);
                function_alert('無法INSERT INTO T10_agency_care_type!<br>');
            }
        }       
    }

                                                                    //T10_agency_collect
    $sql_delete_agency_collect = "DELETE FROM T10_agency_collect WHERE id = '{$id}'";
    if(!mysqli_query($conn,$sql_delete_agency_collect)){   //檢查錯誤
        echo mysqli_error($conn);
        function_alert('無法DELETE T10_agency_collect!<br>');
    }

    for($i=0;$i<count($store_admission_typeInput);$i+=1){
        $admission_typeH = "h_{$store_admission_typeInput["$i"]}";             //h_$English
        $admission_typeM = "m_{$store_admission_typeInput["$i"]}";             //m_$English

        if(!empty($_POST["$admission_typeH"])){
            $$admission_typeH = $_POST["$admission_typeH"];
            $sql_T10_agency_collect_h = "INSERT INTO T10_agency_collect (id, admission_type, money_flag, money)
                                                                VALUES ('{$id}', '{$store_admission_typeInput["$i"]}', 0, '{$$admission_typeH}')";
            if(mysqli_query($conn,$sql_T10_agency_collect_h)){   //檢查錯誤
                echo "成功INSERT INTO T10_agency_collect_h!<br>";
            }
            else{                                               //有誤
                echo mysqli_error($conn);
                function_alert('無法INSERT INTO T10_agency_collect_h!<br>');
            }
        }
        if(!empty($_POST["$admission_typeM"])){
            $$admission_typeM = $_POST["$admission_typeM"];
            $sql_T10_agency_collect_m = "INSERT INTO T10_agency_collect (id, admission_type, money_flag, money)
                                                                VALUES ('{$id}', '{$store_admission_typeInput["$i"]}', 1, '{$$admission_typeM}')";
            if(mysqli_query($conn,$sql_T10_agency_collect_m)){   //檢查錯誤
                echo "成功INSERT INTO T10_agency_collect_m!<br>";
            }
            else{                                               //有誤
                echo mysqli_error($conn);
                function_alert('無法INSERT INTO T10_agency_collect_m!<br>');
            }
        }
    }

                                                                    //T10_cooperative
    $sql_delete_T10_cooperative = "DELETE FROM T10_cooperative WHERE id = '{$id}'";
    if(!mysqli_query($conn,$sql_delete_T10_cooperative)){   //檢查錯誤
        echo mysqli_error($conn);
        function_alert('無法DELETE T10_cooperative!<br>');
    }
    if(!empty($_POST['govInput'])){
        foreach($govInput as $govInputSelect){
            $sql_T10_cooperative = "INSERT INTO T10_cooperative (id, government)
                                                        VALUES ('{$id}', '{$govInputSelect}')";
            if(mysqli_query($conn,$sql_T10_cooperative)){   //檢查錯誤
                echo "成功INSERT INTO T10_cooperative!<br>";
            }
            else{                                               //有誤
                echo mysqli_error($conn);
                function_alert('無法INSERT INTO T10_cooperative!<br>');
            }
        }
    }
    
    $directory = "../image/agency/$id";
    if (is_dir($directory)) {
        $files = glob($directory . '/*'); // 取得資料夾中的所有檔案
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); // 刪除檔案
            }
        }
    }
    $targetDir = "../image/agency/".$id."/";                     // 指定的目標資料夾路徑
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);                          // 如果目標資料夾不存在，則建立資料夾
    }

        $tmpName        = $_FILES['main_image']['tmp_name'];        // 暫存封面的路徑
        $newFileName    = $targetDir."0.png";                       // 路徑為 /image/agency/$id/0.png

        move_uploaded_file($tmpName, $newFileName);                 // 將暫存檔案移動到目標資料夾中

    $image_src = $_FILES['image_src'];                          // 取得上傳的圖片資訊
    foreach ($image_src['name'] as $key => $name) {
        $tmpName = $image_src['tmp_name'][$key];            // 暫存檔案的路徑
        $newFileName = $targetDir . ($key + 1) . ".png";    // 新檔名，以數字遞增編號，副檔名為 .png

        move_uploaded_file($tmpName, $newFileName);         // 將暫存檔案移動到目標資料夾中
    }

    function_alert('修改完成');

}else{
    function_alert("Not Post Method! How Dare You?");
}
                                            //跳窗訊息 header:myAddAgenPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
        window.location.href='myAddAgenPage.php';
    </script>"; 
    return false;
}