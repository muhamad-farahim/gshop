<?php 
include '../staticmethod/static.php';


if(isset($_POST['submit'])){
 Authentication::login();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../corestatic/style.css">
    <title>Document</title>
</head>

<body>

    <!-- NAV STARTS HERE -->

    <nav class="navbar">

        <div class="container h-100">
            <div class="row h-100 w-100 d-flex jus">

                <div class="col-9 col-md-5 h-100">
                    <div class="h-100 d-flex align-items-center">
                        <div class="navbar__logo"><img src="../img/coreimg/GSHOP.png" alt="" srcset=""></div>
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

            </div>

        </div>


    </div>





    <!-- NAV ENDS HERE -->



    <div class="content">
        <div class="container py-5" style="height: 100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 col-lg-4 offset-lg-4 card px-3 px-lg-5 px-sm-5">
                        <h1 class="text-center mt-5" style="font-weight: 750;">Login</h1>
                        <div class="input mb-lg-2 mb-3 ">
                            <form action="" method="post">
                            <label for="country" class="signupp-label my-3"
                                style="font-weight: 500; font-size: 20px;">E-Mail</label>
                            <div class="signupp__inputbox p-2">
                                <i class="fa-solid fa-envelope signupp__icon"></i>
                                <input type="text" name="email" id="country" placeholder="Enter Your Email">
                            </div>
                        </div>

                        <div class="input mb-5">
                            <label for="password" class="signupp-label my-3"
                                style="font-weight: 500; font-size: 20px;">Password</label>
                            <div class="signupp__inputbox p-2">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="password" name="password" placeholder="Enter Your password">
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="submit" name="submit" class="btn-lg btn-primary"></input>
                        </div>
                        </form>
                        <div class="col-12 my-5 pb-4">
                            <a href="./signup/">Dont have an account ? Sign Up</a>
                        </div>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="../corestatic/script.js"></script>

</html>