<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/admindefault.css?v=18"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css?v=36"); ?>" />
	<?php echo $additional_css; ?>
</head>
<body>
<div class="notification"></div>
<div class="loader">
    <svg class="loader-circular">
        <circle class="loader-circular-path" cx="50" cy="50" r="30" fill="none" stroke-width="6" stroke-miterlimit="10"/>
    </svg>
</div>
<div class="menu-container">
	<div class="logo" style="background-image: url(<?php echo base_url("assets/icons/logo.png"); ?>);"></div>
	<a href="<?php echo base_url("admin"); ?>" class="menu<?php echo $menu_active["what"]; ?>">What We Do</a>
    <a href="<?php echo base_url("admin/buy"); ?>" class="menu<?php echo $menu_active["buy"]; ?>">Buy</a>
    <a href="<?php echo base_url("admin/sell"); ?>" class="menu<?php echo $menu_active["sell"]; ?>">Sell</a>
</div>
<div class="header">
	<div class="menu-title"><?php echo $menu_title; ?></div>
    <div class="admin-menu-icon" style="background-image: url(<?php echo base_url("assets/icons/profile.png"); ?>);"></div>
    <div class="admin-menu-container">
        <a href="<?php echo base_url("admin/settings"); ?>" class="admin-menu" >Settings</a>
        <a href="<?php echo base_url("admin_login/logout"); ?>" class="admin-menu" >Logout</a>
    </div>
</div>
<div class="notification"></div>
<div class="container">
<?php 
    if ($this->session->userdata("success_message")) {
        echo "<div class='success-message'>" . $this->session->userdata("success_message") . "</div>";
    }
    if ($this->session->userdata("error_message")) {
        echo "<div class='error-message'>" . $this->session->userdata("error_message") . "</div>";
    }
?>