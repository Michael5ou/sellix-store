<?php


$apiKey = 'RnDl9Ik4YZIMiToepKvr63uwNLfmYlPOqiRwpppn2uzp7gex20bXa5lxslxZoVl7';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://dev.sellix.io/v1/categories',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $apiKey,
        'Cookie: __cf_bm=O04ZwPt3xgr7yFnLqtKkpyqUpidkoeN8MmIb539WDj0-1658722726-0-AYzCmBUqVMFLXYCCTRlZTAVwhn90nVHBBfRzpRvHpQGi+gFpWXhQzBRO85xQjp//FuHGbKv58aA/wWHHwRx/ssY='
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$categories = json_decode($response)->data->categories;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gxd Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shorthandcss@1.1.1/dist/shorthand.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:200,300,400,500,600,700,800,900&display=swap" />
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/style/style.css" />
</head>

<body class="bg-black muli">


    <nav class="w-100pc flex flex-column md-flex-row md-px-10 py-5 bg-black " style="  position: absolute;
  left: 0px;
  top: 0px; z-index: 1;box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
        <div class="flex justify-between">
            <a href="#" class="flex items-center p-2 mr-4 no-underline">
                <img class="max-h-l2 w-auto" src="assets/images/logo_gxd.png" />
            </a>
            <a data-toggle="toggle-nav" data-target="#nav-items" href="#"
               class="flex items-center ml-auto md-hidden indigo-lighter opacity-50 hover-opacity-100 ease-300 p-1 m-3">
                <i data-feather="menu"></i>
            </a>
        </div>
        <div id="nav-items" class="hidden flex sm-w-100pc flex-column md-flex md-flex-row md-justify-end items-center" style="font-family: Muli; font-weight: 800; font-size: 120%;">
            <a href="#home" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Home</a>
            <a href="#features" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Features</a>
            <a href="#pricing" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Pricing</a>
            <a href="#blog" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Blog</a>
            <!-- <a href="#" class="button bg-white black fw-600 no-underline mx-5">Register</a> -->
        </div>
    </nav>
<div id="bg"></div>

<!-- hero section -->
<section id="home" class="min-h-100vh flex justify-start items-center">


        <div class="mx-5 md-mx-l5">


                <h1 class="white fs-l3 lh-2 md-fs-xl1 md-lh-1 fw-900"><span class="underlineez">Your Digital Goods</span></h1>

            <div class="hover-underline-animation">>
                <h1 class="white fs-l3 lh-2 md-fs-xl1 md-lh-1 fw-900"><span class="underlineez">At The Best Price</span></h1>
            </div>
        </div>
</section>



<div class="products-container" id="buy">
    <div class="container">
        <h1 class="section-title">Products</h1>

        <div class="product-list-categories">

            <div class="product-categories">

                <?php
                foreach ($categories as $key => $category) {
                    if ($key == 0) {
                        echo '<button data-id=' . $category->id . ' onclick="showCategory(event)" class="clicked">' . $category->title . '</button>';
                    } else {

                        echo '<button data-id=' . $category->id . ' onclick="showCategory(event)">' . $category->title . '</button>';
                    }
                }
                ?>

            </div>

            <?php
            foreach ($categories as $category) {


                echo '<div class="products" data-category="' . $category->id . '">';

                foreach ($category->products_bound as $product) {
                    echo '
                <div class="product-item">
                    <img src="https://imagedelivery.net/95QNzrEeP7RU5l5WdbyrKw/135c7e4f-96c5-4054-4301-b5a4eb3d7700/shopitem" alt="" class="product-img" />

                    <p class="product-title">' . $product->title . '</p>
                    <div class="product-price">$' . $product->price . '</div>

                    <button     
                      data-sellix-product="' . $product->uniqid . '"
                      type="submit"
                      alt="Buy Now with sellix.io">
                      Buy
                    </button>
                </div>';
                }

                echo " </div>";
            }
            ?>

        </div>
    </div>
</div>

<!-- <img src="https://imagedelivery.net/95QNzrEeP7RU5l5WdbyrKw/135c7e4f-96c5-4054-4301-b5a4eb3d7700/shopitem" alt="" class="product-img" /> -->

<!-- footer -->
<footer class="p-5 md-p-l5 bg-indigo-lightest-10" style="background-color: rgba(0, 0, 0, 0.1) !important;">
    <div class="flex flex-wrap">
        <div class="md-w-25pc mb-10">
            <img src="assets/images/logo_gxd.png" class="w-l5" alt="">
            <div class="white opacity-70 fs-s2 mt-4 md-pr-10">
                <p>We provide you the best services to get your games cheaper.</p>
                <br>
                <p>High quality services, low prices, 24H warranty.</p>
            </div>
        </div>
        <div class="w-100pc md-w-50pc">
            <div class="flex justify-around">

            </div>
        </div>
        <div class="w-100pc md-w-25pc">
            <div class="flex w-75pc md-w-100pc mx-auto">
                <input type="text"
                       class="input flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5 br-r-0"
                       placeholder="Email Address">
                <button class="button bg-indigo indigo-lightest fw-300 fs-s3 br-l-0">Start</button>
            </div>
            <div class="flex justify-around my-8">
                <a href="#" class="relative p-5 bg-indigo br-round white hover-scale-up-1 ease-400"><i
                        data-feather="twitter" class="absolute-center h-4"></i></a> <!--
                <a href="#" class="relative p-5 bg-indigo br-round white hover-scale-up-1 ease-400"><i
                        data-feather="discord" class="absolute-center h-4"></i></a>
                <a href="#" class="relative p-5 bg-indigo br-round white hover-scale-up-1 ease-400"><i
                        data-feather="telegram" class="absolute-center h-4"></i></a> -->
            </div>
        </div>
    </div>
    <p>Designed and coded by Valow</p>
</footer>
    <i class="w-4" data-feather="download"></i>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>
    <script type="text/javascript" src="assets/js/particles.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.sellix.io/static/js/embed.js"></script>
</body>

</html>
