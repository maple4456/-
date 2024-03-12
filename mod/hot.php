<div class="row item mt-2">
    <div class="col-md-12 text-center">
        <h2>
            <i class="fa-solid fa-feather-pointed"></i>
            <i class="fa-solid fa-feather-pointed"></i>人氣商品
            <i class="fa-solid fa-feather-pointed"></i>
            <i class="fa-solid fa-feather-pointed"></i>
        </h2>
    </div>

    <?php
    //建立熱銷商品查詢
    $SQLstring = "SELECT * FROM hot, product, product_img WHERE hot.p_id=product_img.p_id AND hot.p_id=product.p_id AND product_img.sort=1 order by h_sort";
    $hot = $link->query($SQLstring);
    ?>

    <?php while ($data = $hot->fetch()) { ?>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="img-container"><a href="./goods.php?p_id=<?php echo $data['p_id']; ?>"><img src="./product_img/<?php echo $data['img_file'] ?>" class="card-img-top" alt="HOT<?php echo $data['h_sort'] ?>" title="<?php echo $data['p_name']; ?>"></a></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['p_name']; ?></h5>
                    <p class="card-text info"><?php echo mb_substr($data['p_intro'], 0, 30, "utf-8"); ?></p>
                    <p class="card-text">NT<?php echo $data['p_price']; ?></p>
                    <a href="./goods.php?p_id=<?php echo $data['p_id']; ?>" class="btn btn-parrot2">更多資訊</a>
                    <button type="button" id="button01[]" name="button01[]" class="btn btn-parrot" onclick="addcart(<?php echo $data['p_id']; ?>)">放購物車</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>