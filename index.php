<?php


spl_autoload_register(function ($class) {

    require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop' .  '/dataroot/' . $class . '.php');
});

require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop' . '/tools.php');


if (isset($_GET['pid'])) {

    $pobj = ProductRentManager::get(intval($_GET['pid']));

    if (!$pobj) header("location: http://localhost/impproject/gshop/where.php");
} else {
    header("location: http://localhost/impproject/gshop/where.php");

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="corestatic/style.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

<<<<<<< HEAD
<!-- NAV STARTS HERE -->
<?php include_once '../template/navbar.php'; ?>



<!-- NAV ENDS HERE -->
=======
    <!-- NAV STARTS HERE -->
    <nav class="navbar">

        <div class="container h-100">
            <div class="row h-100 w-100 d-flex jus">

                <div class="col-9 col-md-5 h-100">
                    <div class="h-100 d-flex align-items-center">
                        <div class="navbar__logo"><img src="./img/coreimg/GSHOP.png" alt="" srcset=""></div>
                    </div>
                </div>
                <div class="col-3 col-md-5 h-100 p-0 d-flex justify-content-end">
                    <div class=" navbar__burgerdiv h-100 align-items-center justify-content-end">
                        <div id="clickburger" class="navbar__burger"><img class="" src="./img//coreimg/Group 21.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </nav>
    <div class="bignav">

        <div class="container h-100 w-100 p-0">


            <div class="row d-flex justify-content-between h-100 w-100 p-0 m-0">

                <div class="col-3 h-100 p-0 m-0">
                    <div class="bignav__logo d-flex justify-content-center align-items-center">
                        <img src="../img/coreimg/GSHOP.png" alt="" srcset="">
                    </div>
                </div>
                <div class="col-7 p-0">
                    <div class="bignav__linklist d-flex justify-content-end align-items-center h-100">

                        <?php
                        if ($isloggedin) {
                        ?>

                            <div class="bignav__link ml-5">
                                <a href="">
                                    <p class="p-0 m-0">Buy</p>
                                </a>
                            </div>
                            <div class="bignav__link ml-5">
                                <a href="./rentproduct/">
                                    <p class="p-0 m-0">Rent</p>
                                </a>
                            </div>
                            <div class="bignav__link ml-1">
                                <a href="./cart/">
                                    <p class="p-0 m-0">Cart</p>
                                </a>
                            </div>
                            <div class="bignav__link pl">
                                <a href="./profile/">
                                    <p class="p-0 m-0">Profile</p>
                                </a>
                            </div>
                            <div class="bignav__link">
                                <a href="./logout.php/">
                                    <p class="p-0 m-0">Log Out</p>
                                </a>
                            </div>

                        <?php
                        } elseif (!$isloggedin) {
                        ?>

                            <div class="bignav__link ml-5">
                                <a href="">
                                    <p class="p-0 m-0">Buy</p>
                                </a>
                            </div>
                            <div class="bignav__link ml-5">
                                <a href="./rentproduct/">
                                    <p class="p-0 m-0">Rent</p>
                                </a>
                            </div>
                            <div class="bignav__link ml-1">
                                <a href="./login/">
                                    <p class="p-0 m-0">Login</p>
                                </a>
                            </div>
                            <div class="bignav__link pl">
                                <a href="./signup/">
                                    <p class="p-0 m-0">Sign Up</p>
                                </a>
                            </div>

                        <?php

                        }
                        ?>


                    </div>
                </div>

            </div>


        </div>

    </div>

    <div id="dropdownid" class="dropdownn w-100">
        <div class="container w-100 h-100">
            <div class="row h-100">

                <?php

                if ($isloggedin) {

                ?>


                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="">
                                <h3>Buy</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./rentproduct/">
                                <h3>Rent</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./cart/">
                                <h3>Cart</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./profile/">
                                <h3>Profile</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./logout.php">
                                <h3>Log Out</h3>
                            </a>
                        </div>
                    </div>

                <?php

                } else {

                ?>


                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="">
                                <h3>Buy</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./rentproduct/">
                                <h3>Rent</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./login/">
                                <h3>Login</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                            <a href="./signup/">
                                <h3>Sign Up</h3>
                            </a>
                        </div>
                    </div>



                <?php

                }

                ?>



            </div>
        </div>
    </div>
    <div id="overlaynav" class="overlaynav">

    </div>



    <!-- NAV ENDS HERE -->
>>>>>>> 69b8912e618e2057353de0fa95678775c79cec2f


    <div class="productss">

        <div class="container p-0">
            <h1 class="text-center my-5">PRODUCT WE SELL</h1>

            <div class="row gx-2 gy-4 mt-5 productss__grid">

                <?php

                $productsarr = ProductManager::get_all();


                foreach ($productsarr as $p) {



                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-0">

                        <a class="productsscard__linka" href="./product-detail/<?php echo "?pid=$p->id"; ?>">
                            <div class="card productsscard">

                                <img src="./uploadedimg/<?php echo $p->get_photo()['img']; ?>" alt="" class="card-img-top max-photop">
                                <div class="card-body p-3">

                                    <div class="productsscard__maincard py-2">

                                        <p class="my-2"><?php echo $p->name ?></p>


                                        <p class="m-0">
                                            <strong><?php echo 'Rp' . number_format($p->price, 2,  ',', '.') ?></strong>
                                        </p>

                                    </div>
                                    <div class="card-text productsscard__misc">
                                        <div class="productsscard__element">
                                            <div class="productsscard__imgbox">
                                                <img src='./img/default_profile.jpg' alt="" srcset="">
                                            </div>
                                            <p class="productsscard__usertext my-0"><?php echo $p->get_user_name(); ?></p>
                                        </div>
                                        <!-- <div class="productsscard__element productsscard__rating my-2">
                                            <i class="starr"></i>
                                            <p class="my-0">4.7 / 23K sold</p>
                                        </div> -->
                                        <div class="productsscard__element productsscard__variant my-2">
                                            <div class="row gx-4">

                                                <?php

                                                $vararr = $p->get_variants();


                                                foreach ($vararr as $varr) {



                                                ?>

                                                    <div class="col-3">

                                                        <div class="productsscard__variant-box">
                                                            <img src="<?php echo "./uploadedimg/" . $varr['img'] ?>" alt="">
                                                        </div>

                                                    </div>


                                                <?php

                                                }

                                                ?>


                                            </div>
                                        </div>
                                        <div class="productsscard__stock mt-2">
                                            <p class="text-center mb-2">4 stock left</p>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>


                <?php

                }

                ?>

                <!-- here -->
            </div>
            <div class="productts__pagination my-5 d-flex justify-content-center">
                <div class="productss__btns d-flex gx-4">
                    <button class="btn btn-secondary mx-1">Previous</button><button class="btn btn-secondary mx-1">1</button><button class="btn btn-secondary mx-1">2</button><button class="btn btn-secondary mx-1">3</button><button class="btn btn-secondary mx-1">Next</button>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer p-4">


        <div class="container">


            <div class="footer__title d-flex justify-content-center align-items-center">
                <div class="footer__imgtitle">
                    <div class="footer__imgbox"><img src="../img/coreimg/GSHOP.png" alt=""></div>
                </div>
            </div>

            <div class="footer__sosms">
                <div class="footer__sosm">
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div class="footer__sosm">
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="footer__sosm">
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>


        </div>

    </footer>
    <div class="footer__footer text-muted">
        <p>All copyrights reserved web page mywebpage</p>
    </div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./corestatic/script.js"></script>

</html>