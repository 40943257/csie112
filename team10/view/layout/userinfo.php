<?php
$account = $_SESSION["account"];
    $sql_T10_user   = "SELECT * FROM T10_user WHERE account = '$account'";                                  //帳號相同者
    $result_T10_user= mysqli_query($conn,$sql_T10_user);
    $dataT10_user   = mysqli_fetch_assoc($result_T10_user);
?>
<div class="container mb-3">
    <div class="row align-items-center justify-content-center">
        <div class="col-6">
            <div id="loginForm">
                <form method="post" action="./updateUserInfo.php">
                    <div class="mb-3">
                        <label for="account" class="form-label">帳號</label>
                        <input type="account" class="form-control" name = "account" id="account" 
                            value ="<?php echo $dataT10_user["account"]; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" class="form-control" name = "password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">姓名</label>
                        <input type="text" class="form-control" name = "name" id="Name"
                            value ="<?php echo $dataT10_user["name"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Mail" class="form-label">信箱</label>
                        <input type="email" class="form-control" name = "mail" id="Mail" 
                            value = "<?php echo $dataT10_user["email"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">聯繫電話</label>
                        <input type="tel" class="form-control" name = "tel" id="tel" 
                            value = "<?php echo $dataT10_user["phone"]; ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>