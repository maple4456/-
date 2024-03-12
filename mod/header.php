<div class="container-fluid">
    <div class="search row">
        <div class="col-md-5">
            <a href="#" title="facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" title="LINE"><i class="fa-brands fa-line"></i></a>
            <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="col-md-3">
            <div class="searchbar">
                <form name="search" action="./product.php" id="search" method="get">
                    <div class="input-group">
                        <input type="text" name="search_name" id="search_name" class="form-control" placeholder="Search..." value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" required>
                        <span class="input-group-bth">
                            <button class="btn btn-default" type="submit">
                                <i class="fas fa-search fa-lg"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <?php
        //讀取後台購物車內產品數量
        $SQLstring = "SELECT * FROM cart WHERE orderid is NULL AND ip='" . $_SERVER['REMOTE_ADDR'] . "'";
        $cart_rs = $link->query($SQLstring);
        ?>
        <div class="col-md-4">


            <a href="./cart.php" title="購物車"><i class="fa-solid fa-cart-shopping"></i><span class="badge text-bg-danger"><?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span></a>
            <a href="#" title="願望清單"><i class="fa-solid fa-heart"></i></a>
            <?php if (!isset($_SESSION['login'])) { ?>
                <a href="./login.php" title="會員中心"><i class="fa-solid fa-user"></i></a>
            <?php } else { ?>
                <a href="#" title="會員中心"><i class="fa-solid fa-user"></i></a>
                <a class="nav-link right" href="javascript:void(0);" title="登出" onclick="btn_confirmLink('是否確定登出？','./mod/logout.php')"><i class="fa-solid fa-right-from-bracket logout"></i></a>
            <?php } ?>


        </div>
    </div>
    <div class="nav row">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php"><img src="./images/logo.jpg" alt="logo" class="logo" title="鸚仔鋪"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./product.php">所有商品</a>
                        </li>
                        <?php multiList01(); ?>
                    </ul>
                </div>
                <div class="parrotImg">
                    <img src="./images/egg.png" alt="" width="50px">
                    <img src="./images/parrot.png" alt="" width="100px">
                    <img src="./images/parrot.png" alt="" width="70px">
                    <img src="./images/egg.png" alt="" width="30px">
                    <img src="./images/parrot.png" alt="" width="100px">
                </div>
            </div>
        </nav>
    </div>
</div>

<?php
function multiList01()
{
    global $link;
    //列出產品類第一層
    $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
    $pyclass01 = $link->query($SQLstring);
?>
    <?php while ($pyclass01_Rows = $pyclass01->fetch()) { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $pyclass01_Rows['cname']; ?></a>
            <ul class="dropdown-menu">
                <?php
                //列出產品類別第二層
                $SQLstring = sprintf("SELECT * FROM pyclass where level=2 and uplink=%d order by sort", $pyclass01_Rows['classid']);
                $pyclass02 = $link->query($SQLstring);
                ?>
                <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                    <li><a href="product.php?classid=<?php echo $pyclass02_Rows['classid']; ?>" class="dropdown-item">
                            <em class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></em>
                            <?php echo $pyclass02_Rows['cname']; ?>
                        </a></li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
<?php } ?>