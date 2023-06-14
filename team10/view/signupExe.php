<?php
$conn=require_once "./layout/config.php";
 
$account=$_POST["account"];
$password=$_POST["password"];
$name=$_POST["name"];
$mail=$_POST["mail"];
$tel=$_POST["tel"];

//hash 19.1
$password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql = "INSERT INTO T10_user (account, name, password, email, phone) VALUES ('{$account}', '{$name}', '{$password_hash}', '{$mail}', '{$tel}')";

if(mysqli_query($conn,$sql)){               //檢查錯誤
    function_alert("成功註冊!");
}
else{                                       //有誤
    function_alert("無法創建帳號!"); 
}
                                            //跳窗訊息 header:index.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
        window.location.href='index.php';
    </script>"; 
    return false;
}