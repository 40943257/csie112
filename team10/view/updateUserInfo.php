<?php
session_start();
$conn=require_once "./layout/config.php";

$accountSession = $_SESSION["account"];     //session
$password       = $_POST["password"];
$name           = $_POST["name"];
$mail           = $_POST["mail"];
$tel            = $_POST["tel"];

$sql_T10_user   = "SELECT * FROM T10_user WHERE account = '$accountSession'";                   //帳號相同者
$result_T10_user= mysqli_query($conn,$sql_T10_user);
$dataT10_user   = mysqli_fetch_assoc($result_T10_user);

if(!empty($password)){                                                                          //password
    $password_hash=password_hash($password,PASSWORD_DEFAULT);
    update('password',$password_hash);
}
if($name != $dataT10_user["name"]){                                                             //name
    update('name',$name);
}
if($mail != $dataT10_user["email"]){                                                            //email
    update('email',$mail);
}
if($tel != $dataT10_user["phone"]){                                                             //phone
    update('phone',$tel);
}
function_alert("成功更新個人資料");

function update($fieldName,$fieldValue){
    $conn           = $GLOBALS["conn"];                                                         //取得全域變數
    $accountSession = $GLOBALS["accountSession"];

    $sql_update = "UPDATE T10_user SET $fieldName = '$fieldValue' WHERE account = '$accountSession'";
    if(mysqli_query($conn,$sql_update)){
        //echo "成功將{$fieldName}填入{$fieldValue}\<br>";
    }else{
        function_alert("在更新 $fieldName 時發生錯誤");
    }
}

function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
        window.location.href='userInfo.php';
    </script>"; 
    return false;
}