<?php

session_start();


spl_autoload_register(function ($class) {

    require_once('../dataroot/' . $class . '.php');
});

require_once '../tools.php';

// $_SESSION['userid'] = 2;

$isloggedin = false;

if (isset($_SESSION['userid'])) {

    $isloggedin = verifyuserid($_SESSION['userid']);
}

?>



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
                        <a href="../index.html">
                            <p class="p-0 m-0">Buy</p>
                        </a>
                    </div>
                    <div class="bignav__link ml-5">
                        <a href="../rentproduct/">
                            <p class="p-0 m-0">Rent</p>
                        </a>
                    </div>
                    <div class="bignav__link ml-1">
                        <a href="../cart/">
                            <p class="p-0 m-0">Cart</p>
                        </a>
                    </div>
                    <div class="bignav__link pl">
                        <a href="../profile/">
                            <p class="p-0 m-0">Profile</p>
                        </a>
                    </div>
                    <div class="bignav__link">
                        <a href="../logout.php/">
                            <p class="p-0 m-0">Log Out</p>
                        </a>
                    </div>

                <?php
                } elseif (!$isloggedin) {
                ?>

                    <div class="bignav__link ml-5">
                        <a href="../index.html">
                            <p class="p-0 m-0">Buy</p>
                        </a>
                    </div>
                    <div class="bignav__link ml-5">
                        <a href="../rentproduct/">
                            <p class="p-0 m-0">Rent</p>
                        </a>
                    </div>
                    <div class="bignav__link ml-1">
                        <a href="../cart/">
                            <p class="p-0 m-0">Login</p>
                        </a>
                    </div>
                    <div class="bignav__link pl">
                        <a href="../profile/">
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
                    <a href="../rentproduct/">
                        <h3>Rent</h3>
                    </a>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                    <a href="../cart/">
                        <h3>Cart</h3>
                    </a>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                    <a href="../profile/">
                        <h3>Profile</h3>
                    </a>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                    <a href="../logout.php">
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
                    <a href="./cart/">
                        <h3>Login</h3>
                    </a>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="dropdownn__items d-flex justify-content-center align-items-center h-100">
                    <a href="./profile/">
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