<?php
    // Include the simple_html_dom library
    include_once('simple_html_dom.php');

    function flipkart_fetch($url){
         // Set the URL of the product page to be scraped
        $flipkart_url = $url;

        // Load the HTML content of the product page using simple_html_dom
        $html = file_get_html($flipkart_url);

        // Extract the desired product details from the loaded HTML
        $product_title = $html->find('span[class="B_NuCI"]',0)->plaintext;
        $img = $html->find('img[class="_396cs4 _2amPTt _3qGmMb"]',0)->src;
        $product_price = $html->find('div[class="_30jeq3 _16Jk6d"]', 0)->plaintext;

        $arr = [$flipkart_url,$product_title,$product_price,$img];

        return $arr;
    }
    function reliance_fetch($url){
         // Set the URL of the product page to be scraped
        $reliance_url = $url;

        // Load the HTML content of the product page using simple_html_dom
        $html = file_get_html($reliance_url);

        // Extract the desired product details from the loaded HTML
        // $product_title = $html->find('h1[class="pdp__title mb__20"]',0)->plaintext;
        // $img = $html->find('img[class="_396cs4 _2amPTt _3qGmMb"]',0)->src;
        $product_price = $html->find('span[class="pdp__offerPrice"]', 0)->plaintext;

        return $product_price;
    }

   
?>
