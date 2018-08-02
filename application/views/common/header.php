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

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css"); ?>" />
    <?php echo $additional_css; ?>
</head>
<body>
<div class="logo-header" style="background-image: url(<?php echo base_url("assets/icons/logo.jpg"); ?>);"></div>
<div class="header-menu-container">
    <a href="<?php echo base_url("buy"); ?>" class="header-menu" data-menu="1"><span class="white-line"></span>BUY</a><br>
    <a href="<?php echo base_url("sell"); ?>" class="header-menu" data-menu="2"><span class="white-line"></span>SELL</a><br>
    <a href="<?php echo base_url("testimony"); ?>" class="header-menu" data-menu="3"><span class="white-line"></span>TESTIMONY</a><br>
    <a href="<?php echo base_url("contact"); ?>" class="header-menu" data-menu="4"><span class="white-line"></span>CONTACT US</a><br>
</div>
<div class="subtitle show" data-menu="0"></div>
<div class="subtitle" data-menu="1">BUY</div>
<div class="subtitle" data-menu="2">SELL</div>
<div class="subtitle" data-menu="3">TESTIMONY</div>
<div class="subtitle" data-menu="4">CONTACT</div>
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
<div class="container">