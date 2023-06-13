<?php
$body_height = null;
$haveBg = array('industry', 'expert', 'resource');

if (in_array(get_post_type(), $haveBg)) {
    $the_bar = (!is_user_logged_in()) ? '' : '-bar';
    $body_height = 'bodyTop' . $the_bar;
}

?>

<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() . '/images/favicon.ico' ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css">

    <?php wp_head()?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0099/9049.js" async="async"></script>
</head>

<body <?php body_class($body_height);?>>

<header class="sticky-header">
  <div class="container">
    <div class="header-logo">
      <a href="#"><img src="equiteq-logo.png" alt="Equiteq Logo"></a>
    </div>
    <nav class="main-navigation">
      <ul>
        <li><a href="#">Services</a>
          <ul class="sub-menu">
            <li><a href="#">Buy Advisory</a></li>
            <li><a href="#">Sell Advisory</a></li>
            <li><a href="#">Corporate Divestitures</a></li>
            <li><a href="#">Strategic Deal Origination</a></li>
          </ul>
        </li>
        <li><a href="#">Sectors</a>
          <ul class="sub-menu">
            <li><a href="#">Technology Services & Outsourcing Software</a></li>
            <li><a href="#">Management Consulting</a></li>
            <li><a href="#">Engineering Consulting & Services</a></li>
            <li><a href="#">Human Capital Management</a></li>
            <li><a href="#">Marketing, Communication & Information Services</a></li>
          </ul>
        </li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Resources</a></li>
        <li><a href="#">Our Team</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
  </div>
</header>
