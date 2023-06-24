<?php
$conn=require_once "./layout/config.php";
 
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
    foreach($admission_typeInput as $admission_typeSelect){
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