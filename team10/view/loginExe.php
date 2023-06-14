<?php
session_start();
$conn=require_once "./layout/config.php";
 
$account=$_POST["account"];
$password=$_POST["password"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql_T10_user   = "SELECT * FROM T10_user WHERE account = '$account'";                                  //帳號相同者
    $result_T10_user= mysqli_query($conn,$sql_T10_user);
    $dataT10_user   = mysqli_fetch_assoc($result_T10_user);

    if(mysqli_num_rows($result_T10_user)==1 && (password_verify($password,$dataT10_user["password"]))){     //找到帳號&&驗證密碼
                                                                                                                //儲存SESSION: account
        $_SESSION["account"] = $dataT10_user["account"];
                                                                                                                //setCookie
        if(isset($_POST["setRememberLoginInfo"])){
            setcookie("cookieAccount",$account,time()+60*60*24*7);
            setcookie("cookiePassword",$password,time()+60*60*24*7);
        }
                                                                                                                //根據權限導引頁面
        switch($dataT10_user["account"]){
            case 'admin304':                                                                                        //轉至admin
                header("location:./");
                break;
            default:                                                                                                //轉至user
                header("location:./index.php");
                break;
        }
    }else{                                                                                                      //帳號或密碼錯誤
        function_alert("帳號或密碼錯誤"); 
    }
}
else{                                                                                                       //$_SERVER["REQUEST_METHOD"] != "POST"
    function_alert("Something wrong"); 
}

                                                                                                            //關閉 config.php->$link連線
    mysqli_close($link);

function function_alert($message) {
    echo "<script>alert('$message');
        window.location.href='./loginPage.php';
    </script>"; 
    return false;
}