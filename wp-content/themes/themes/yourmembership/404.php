<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package yourmembership
 */

?>
<!doctype HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Not Found - YourMembership.com</title>
</head>
<body id="pagebody">

<style type="text/css">

    #pagebody {
        background-color:#A8AD00;
        font-family: 'Lato', sans-serif;
        color:#fff;
        text-align:center;
    }
    .big {
        font-weight: 700;
        font-size: 60px;
        text-transform:uppercase;
    }
    #content {
        bottom: 0;
        height: 410px;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0;
        top: 0;
        width: 300px;
    }
    #content a {
        margin-bottom: 20px;
        display: block;
    }
    #content img {
        border:none;
        outline:none;
    }
    .backhome {
        background-color: #5b6770;
        color: #fff;
        display: inline-block;
        margin-top: 30px;
        padding: 15px 20px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        margin-bottom: 0;
    }
    .backhome:hover {
        background-color:#002E5D;
    }

</style>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MZMRHW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MZMRHW');</script>
<!-- End Google Tag Manager -->

<div id="content">
    <a href="http://www.yourmembership.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png"></a>
    <span class="big">404 Error</span><br>
    <?php

    $url = $_SERVER['REQUEST_URI'];

    if (strpos($url, '/snf') !== false) {
        echo "<p>The site you're looking for is no longer hosted here.</p> <a class=\"backhome\" href=\"javascript:;\" onClick=\"history.go(-1);\">Click here to return to the previous page</a>" ;
    }
    else
        echo "<p>The page you're looking for was not found.</p> <a class=\"backhome\" href=\"http://www.yourmembership.com/\">Click here to return to the homepage</a>" ;
    ?>
</div>


</body>
</html>