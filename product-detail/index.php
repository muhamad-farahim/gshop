<?php


spl_autoload_register(function ($class) {

    require_once($_SERVER['DOCUMENT_ROOT'] . '/impproject/gshop' .  '//dataroot/' . $class . '.php');
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../corestatic/style.css">
    <title>Document</title>
</head>

<body>

 <!-- NAV STARTS HERE -->
 <?php include_once '../template/navbar.php'; ?>
<!-- NAV ENDS HERE -->



    <div class="container pdetaill my-5">

        <div class="row">

            <div class="col-12 col-lg-7">

                <div class="pdetaill__photo card justify-content-center align-items-center">
                    <img src="../img/lens.webp" alt="">
                </div>

                <div class=" card pdetaill__photolistsm d-flex justify-content-center align-items-center">
                    <div class="pdetaill__scroll align-items-center px-3">
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                        <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-5">
                <div class=" pdetaill__detail-price card justify-content-center align-items-center">
                    <div class="card-body justify-content-center text-center">
                        <div class="card-title">
                            <h2>Camera Cannon 5 PRO</h2>
                        </div>
                        <div class="card-title">
                            <h2 class="pdetaill__cardprice">12.000.000</h2>
                        </div>
                        <div class="sub pdetaill__cardsub">Quality of items and rent time</div>
                        <form action="" class="mt-4 pdetaill__form">
                            <div class="pdetaill__inputs">
                                <input type="number" name="" id="" value="1" class="form-control">

                                <a href="../cart/" class="btn pdetaill__formbtn btn-danger">ADD TO CART</a>
                            </div>
                        </form>
                        <div class="sub my-2 ">4 stock left out of 10</div>
                    </div>

                </div>
                <div class=" pdetaill__detail-variant card py-2 px-3">
                    <div class="pdetaill__element">
                        <div class="pdetaill__imgbox">
                            <img src='../img/default_profile.jpg' alt="" srcset="">
                        </div>
                        <div class="pdetaill__usertextbox">
                            <p class="pdetaill__usertext my-0">Super User</p>
                        </div>
                    </div>
                    <div class="pdetaill__element pdetaill__rating my-2">
                        <i class="starr"></i>
                        <div class="pdetaill__usertextbox">
                            <p class="my-0">4.7 / 23K sold, since(2013)</p>
                        </div>
                    </div>
                    <div class="pdetaill__variant my-4">
                        <div class="pdetaill__variant title">
                            <h3>ITEM VARIANTS</h3>
                            <div class="pdetaill__hr"></div>
                        </div>
                        <div class="row gx-4">
                            <div class="variantt">
                            <form action="">
                            <label>
                                  <div class="col-3">
                                      <input type="radio" name="variantt" id="variant">
                                      <div class="pdetaill__variant-box v-1"></div>
                                  </div>
                            </label>
                            <label>
                                  <div class="col-3">
                                  <input type="radio" name="variantt" id="variant">
                                  <div class="pdetaill__variant-box v-2"></div>
                                  </div>
                                </label>
                            <label>
                                   <div class="col-3">
                                   <input type="radio" name="variantt" id="variant">
                                   <div class="pdetaill__variant-box v-3"></div>
                                   </div>
                            </label>
                            <label>
                            <div class="col-3">
                            <input type="radio" name="variantt" id="variant">
                                <div class="pdetaill__variant-box v-4"></div>
                            </div>
                            </label>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class=" card pdetaill__photolist">
            <div class="pdetaill__scroll align-items-center px-3">
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
                <div class="pdetaill__photolist-photo"><img src="/img/lens.webp" alt=""></div>
            </div>
        </div>

        <div class="card pdetaill__desc p-3 px-5 pb-3">
            <div class="card-body">
                <div class="card-title text text-center">
                    <h1>DESCRIPTION</h1>
                    <div class="hr"></div>
                </div>
                <div class="card-text">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate pariatur est maxime vero iure?
                    Quisquam, qui officia necessitatibus voluptatum explicabo aspernatur quasi. Quam, cupiditate facere,
                    sapiente nisi quod animi facilis soluta dignissimos nulla provident eius architecto ab quidem, vitae
                    ut magnam magni pariatur quos neque eaque assumenda eos quis? Accusamus distinctio expedita, aliquam
                    tempora dolorum id alias assumenda dolore soluta porro fugit possimus, ipsum hic? Ipsa delectus
                    veritatis quas ipsam deleniti vero rerum odio necessitatibus modi ab quidem facilis, enim blanditiis
                    nostrum nobis rem dignissimos aut et exercitationem molestias ducimus reprehenderit nisi. Aliquam
                    facere quaerat nesciunt sequi deserunt sit quae quis eum incidunt, necessitatibus consectetur
                    asperiores, culpa facilis? Recusandae perspiciatis quasi voluptatem beatae laudantium molestias
                    magni quam doloribus iste impedit, reprehenderit eum hic fugiat voluptates quibusdam magnam illum,
                    totam laboriosam, cumque suscipit! Ipsam accusamus officiis quae numquam ipsa nisi dolore
                    perspiciatis accusantium molestiae eaque, ex, eius quidem asperiores libero cupiditate!


                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ad, facilis minima ratione
                    voluptatem beatae neque iure nihil iusto quas non molestias animi debitis id explicabo architecto.
                    Pariatur tempore nulla dicta laborum distinctio, consequuntur, delectus eum dolorem officia qui
                    earum fugiat molestiae. Consequuntur hic harum dolorum cum distinctio necessitatibus ut voluptate
                    vero molestias, optio facere dolor beatae excepturi quas minima fugit quasi aperiam ipsum. Non
                    mollitia sit perferendis, dolorem magni atque iure distinctio ipsam hic numquam, illo fuga saepe est
                    sunt sapiente. Iste mollitia maiores at alias pariatur libero eos nobis porro, dolor tenetur,
                    explicabo culpa inventore ipsam! Delectus minus molestias exercitationem quis repellendus, illo quos
                    molestiae dolores possimus alias ea tempore, libero nostrum omnis! Cumque molestiae inventore
                    deleniti ea rem recusandae officia. Nihil optio perferendis, quam accusamus velit ducimus, suscipit
                    ut dolore et provident, voluptatem qui earum quis quasi obcaecati delectus. Maiores aut eligendi
                    eveniet, rem sunt quod repudiandae.
                </div>
                <div class="hr2"></div>
                <div class="text-center ">
                    <i class="fa-solid fa-angle-down pdetaill__arrdown"></i>
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