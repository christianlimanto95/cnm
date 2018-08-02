<html>
<head>
	<title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url("assets/icons/favicon.png"); ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo base_url("assets/icons/logo.png"); ?>" />
    <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
	<?php if (isset($meta_description)) {
        echo "<meta name='description' content='" . $meta_description . "' />";
        echo "<meta name='og:description' content='" . $meta_description . "' />";
    } ?>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="702991525631-258gshg35oef1lfhnt21hohro5rjito9.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css?v=9"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=34"); ?>" />
    <?php echo $additional_css; ?>
</head>
<body>
<div class="header-menu-container">
    <a href="#" class="header-menu"><span class="white-line"></span>BUY</a><br>
    <a href="#" class="header-menu"><span class="white-line"></span>SELL</a><br>
    <a href="#" class="header-menu"><span class="white-line"></span>TESTIMONY</a><br>
    <a href="#" class="header-menu"><span class="white-line"></span>CONTACT US</a><br>
</div>
<script>
var vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
var vh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
if (vw < 1025) {
    isMobile = true;
    if (vw >= 768) {
        isTablet = true;
    } else {
        isTablet = false;
    }
} else {
    isMobile = false;
}
</script>
<div class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo.jpg"); ?>);"></div>
<div class="container">