    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
                <form method="post" action="./signupExe.php" class="mb-3">
                    <div class="mb-3">
                        <label for="Account" class="form-label">帳號</label>
                        <input type="account" class="form-control" name = "account" id="Account" placeholder="帳號 / Account">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="Password" class="form-label">密碼</label>
                            <input type="password" class="form-control" name = "password" id="Password" placeholder="密碼 / Password">
                        </div>
                        <div class="col">
                            <label for="checkPassword" class="form-label">確認密碼</label>
                            <input type="password" class="form-control" name = "checkPassword" id="checkPassword">                            
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">姓名</label>
                        <input type="text" class="form-control" name = "name" id="Name">
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="Mail" class="form-label">信箱</label>
                            <input type="email" class="form-control" name = "mail" id="Mail">
                        </div>
                        <div class="col-6">
                            <label for="tel" class="form-label">聯繫電話</label>
                            <input type="tel" class="form-control" name = "tel" id="tel">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">註冊</button>
                    </div>
                </form>
            </div>
        </div>
    </div>