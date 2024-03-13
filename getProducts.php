<?php

//Add here 
$apiKey = 'add key here';

$curl = curl_init();

//get categories
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

    ),
));

$response = curl_exec($curl);
$categories = json_decode($response)->data->categories;

curl_close($curl);


$curl = curl_init();



//get products
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://dev.sellix.io/v1/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $apiKey,

    ),
));
$response = curl_exec($curl);

curl_close($curl);

$products = json_decode($response)->data->products;
// print_r($products);


$finalProducts = [];

foreach ($categories as $category) {
    $individualCategory = [$category->title, $category->id, []];


    //product from category
    foreach ($category->products_bound as $productFromCategory) {

        //match product from category with product from products
        foreach ($products as $product) {

            if ($productFromCategory->uniqid == $product->uniqid) {

                $imageId = $product->image_attachment !== null ? $product->image_attachment->cloudflare_image_id : "none";
                // if ($product->stock > 0) {
                array_push($individualCategory[2], [$product->title, $product->uniqid, $product->price_display, $product->description, $imageId, $product->stock]);
                // }
            }
        }
    }



    array_push($finalProducts, $individualCategory);
}


// print_r($finalProducts);
