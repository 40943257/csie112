<?php
$conn=require_once "./layout/config.php";
 
$name=$_POST["name"];                                       //機構名稱
$phone=$_POST["phone"];                                     //聯絡電話
$address=$_POST["address"];                                 //機構地址
                                                            //類型
$admission_type = ['日照型','day','住宿型','stay','養護型','curing'];
$admission_typeInput = $_POST['admission_typeInput'];
                                                            //長照對象
$care_type = ['一般人','normal','精神障礙','unnormail'];
$care_typeInput = $_POST['care_typeInput'];
$start=$_POST["start"];$end=$_POST["end"];                  //最小最大年齡
$people=$_POST["people"];                                   //核准收容人數
include './layout/gov.php';                                 //政府
$gov;
$govInput = $_POST['govInput'];
$detailed=$_POST["detailed"];                               //詳細描述

echo "機構名稱: $name <br>";
echo "聯絡電話: $phone <br>";
echo "機構地址: $address <br>";

if(isset($admission_typeInput)){
    echo "類型:<br>";
    foreach($admission_typeInput as $admission_typeSelect){
        echo "\t{$admission_typeSelect}<br>";
    }    
}else{
    echo "沒有選擇類型<br>";
}

if(isset($care_typeInput)){
    echo "長照對象:<br>";
    foreach($care_typeInput as $care_typeInputSelect){
        echo "\t{$care_typeInputSelect}<br>";
    }    
}else{
    echo "沒有選擇長照對象<br>";
}

if(isset($govInput)){
    echo "政府:<br>";
    foreach($govInput as $govInputSelect){
        echo "\t{$govInputSelect}<br>";
    }    
}else{
    echo "沒有選擇政府<br>";
}

echo "最小年齡: $start 最大年齡: $end <br>";
echo "核准收容人數: $people <br>";
echo "詳細描述: $detailed <br>";

// $sql = "INSERT INTO T10_user (account, name, password, email, phone) VALUES ('{$account}', '{$name}', '{$password_hash}', '{$mail}', '{$tel}')";

// if(mysqli_query($conn,$sql)){               //檢查錯誤
//     function_alert("成功註冊!");
// }
// else{                                       //有誤
//     function_alert("無法創建帳號!"); 
// }
                                            //跳窗訊息 header:myAddAgenPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
        //window.location.href='myAddAgenPage.php';
    </script>"; 
    return false;
}