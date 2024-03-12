<div class="row">
    <div class="col-lg-12 text-center">
        <h1>會員註冊頁面</h1>
        <p>請輸入相關資料，*為必需輸入欄位</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 offset-2 text-left">
        <form action="register.php" id="reg" name="reg" method="POST">
            <div class="input-group mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="*請輸入email帳號">
            </div>
            <div class="input-group mb-3">
                <input type="password" id="pw1" name="pw1" class="form-control" placeholder="*請輸入密碼">
            </div>
            <div class="input-group mb-3">
                <input type="password" id="pw2" name="pw2" class="form-control" placeholder="*請再次確認密碼">
            </div>
            <div class="input-group mb-3">
                <input type="text" id="cname" name="cname" class="form-control" placeholder="*請輸入姓名">
            </div>
            <div class="input-group mb-3">
                <input type="text" id="tssn" name="tssn" class="form-control" placeholder="請輸入身份證字號">
            </div>
            <div class="input-group mb-3">
                <input type="text" id="birthday" name="birthday" onfocus="(this.type='date')" class="form-control" placeholder="*請選擇生日">
            </div>
            <div class="input-group mb-3">
                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="請輸入手機號碼">
            </div>
            <div class="input-group mb-3">
                <select name="myCity" id="myCity" class="form-control">
                    <option value="">請選擇市區</option>
                    <?php $city = "SELECT * FROM city WHERE State=0";
                    $city_rs = $link->query($city);
                    while ($city_rows = $city_rs->fetch()) { ?>
                        <option value="<?php echo $city_rows['AutoNo']; ?>"><?php echo $city_rows['Name']; ?></option>
                    <?php } ?>
                </select><br>
                <select name="myTown" id="myTown" class="form-control">
                    <option value="">請選擇地區</option>
                </select>
            </div>
            <label for="address" class="form-label" id="zipcode" name="zipcode">郵遞區號：地址</label>
            <div class="input-group mb-3">
                <input type="hidden" name="myZip" id="myZip" value="">
                <input type="text" id="address" name="address" class="form-control" placeholder="請輸入後續地址">
            </div>
            <label for="fileToUpload" class="form-label">上傳相片：</label>
            <div class="input-group mb-3">
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" title="請上傳相片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                <p class="mt-1"><button type="button" class="btn btn-danger" id="uploadForm" name="uploadForm">開始上傳</button></p>

                <div id="progress-div01" class="progress" style="width:100%; display:none;">
                    <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" aria-label="Default striped example" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>

                <input type="hidden" name="uploadname" id="uploadname" value="">
                <img src="" alt="photo" id="showimg" name="showimg" style="display:none;">
            </div>
            <div class="input-group mb-3">
                <input type="hidden" name="captcha" id="captcha" value="">
                <a href="javascript:void(0);" title="按我更新認證碼" onclick="getCaptcha();">
                    <canvas id="can"></canvas>
                </a>
                <input type="text" name="recaptcha" id="recaptcha" class="form-control" placeholder="請輸入認證碼">
            </div>
            <input type="hidden" name="formctl" id="formctl" value="reg">
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-success btn-lg">送出</button>
            </div>
        </form>
    </div>
</div>