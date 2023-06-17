<div class="container mb-3">
    <div class="row align-items-center justify-content-center">
        <div class="col-6">
            <div id="loginForm">
                <form method="post" action="./loginExe.php">
                    <div class="mb-3">
                        <label for="account" class="form-label">帳號</label>
                        <input type="account" class="form-control" name = "account" id="account" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" class="form-control" name = "password" id="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name = "setRememberLoginInfo" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">保持登入</label>
                    </div>
                    <div id="loginbtn" class="text-center">
                        <button type="submit" class="btn btn-primary">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>