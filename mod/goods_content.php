<div class="card mb-3">
    <div class="row g-0 mt-5">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <?php
            //取得產品圖片檔名資料
            $SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
            $img_rs = $link->query($SQLstring);
            $imgList = $img_rs->fetch();
            ?>
            <img id="showGoods" name="showGoods" src="product_img/<?php echo $imgList['img_file']; ?>" class="img-fluid rounded-start" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>">
            <div class="row mt-2">
                <?php do { ?>
                    <div class="col-md-4">
                        <a href="product_img/<?php echo $imgList['img_file']; ?>" rel="group" class="fancybox" title="<?php echo $data['p_name']; ?>">
                            <img src="product_img/<?php echo $imgList['img_file']; ?>" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>" class="img-fluid">
                        </a>
                    </div>
                <?php } while ($imgList = $img_rs->fetch()); ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['p_name']; ?></h5>
                <p class="card-text"><?php echo $data['p_intro']; ?></p>
                <h4 class="color_price">$<?php echo $data['p_price']; ?></h4>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text color_count" id="inputGroup-sizing-lg">數量</span>
                            <input type="number" id="qty" name="qty" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button name="button01" id="button01" type="button" class="btn btn-parrot3" onclick="addcart(<?php echo $data['p_id']; ?>)">加入購物車</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10 pt-5 pb-5">
            <hr>
            <h5 class="pb-2 p_content">商品說明</h5>
            <p><?php echo $data['p_content']; ?></p>
        </div>
    </div>
</div>
<?php //require_once('./mod/drop-box.php'); 
?>