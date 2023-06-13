<div class="container mb-3">
    <div class="row align-items-center justify-content-center">
        <div class="col-6">
            <div id="loginForm">
                <form method="post" action="">
                    <div class="mb-3">
                    <label for="Account" class="form-label">帳號</label>
                    <input type="account" class="form-control" name = "account" id="account" placeholder="帳號 / Account" required>
                    </div>
                    <div class="mb-3">
                    <label for="Password" class="form-label">密碼</label>
                    <input type="password" class="form-control" name = "password" id="password" placeholder="密碼 / Password" required>
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" name = "setRememberLoginInfo" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">保持登入</label>
                    </div>
                    <div id="loginbtn">
                        <button type="submit" class="btn btn-primary">登入 / Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>