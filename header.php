<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?php bloginfo('name'); ?></title>

<?php wp_head(); ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<div style="background-color:red; color:#ffffff; padding: 25px; position:fixed; z-index:99999; width:100%;">
	<p>Helaas kunnen wij uw browser niet ondersteunen.</p>
	<p>Het is nodig om uw browser te updaten naar een nieuwe versie!</p><a href="http://windows.microsoft.com/nl-nl/internet-explorer/download-ie">UPDATE NU</a></div>
<![endif]-->

<!-- SCRIPTS INLADEN IVM AVG -->
<?php 
if(in_array('cc-dashboard/cc-dashboard.php', apply_filters('active_plugins', get_option('active_plugins')))){
	require_once ABSPATH . '/wp-content/plugins/cc-dashboard/koekje.php';
} 
?>
<!-- SCRIPTS INLADEN IVM AVG -->

</head>
<body>
	
<div id="preloader"></div>
	
<div class="pos-f-t fixed-top vlak-wit">
	<div class="container">
		<div class="row">
			<a class="navbar-brand" href="<?php echo home_url(); ?>">
				<img class="headerlogo hoef" src="<?php echo esc_url( get_theme_mod( 'eigen_logo' ) ); ?>" alt="<?php bloginfo('name'); ?>">
			</a>
			<div class="topinfo d-none d-md-inline-block">
				<a href="tel:0383031844" class="tekst-paars">T 038 303 18 44</a>
				<span class="social-icons-header">
					<a href="https://www.linkedin.com/company/catent" target="_blank">
						<span class="fa-stack fa-2x tekst-rood">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
						</span>
					</a>
				</span>
				<a href="<?php echo home_url(); ?>/contact" class="button button-rood mt-2 mb-5" style="margin-left: 15px; display: inline;">Contact <i class="fal fa-long-arrow-right"></i></a>
			</div>
			<label>
				<input type="checkbox">
				<span id="uitklapper" class="menu">
					<span class="hamburger"></span>
				</span>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container'=> false, 'menu_class'=> false, 'menu_id'=> 'menu-1','items_wrap' => '<ul class="hoofdmenu">%3$s</ul>' ) ); ?> 
			</label>
		</div>
	</div>
	<div class="sub-header d-none d-md-block">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php wp_nav_menu( array( 'theme_location' => 'second-header-menu', 'container'=> false, 'menu_class'=> false, 'menu_id'=> 'menu-2','items_wrap' => '<ul class="second-menu">%3$s</ul>' ) ); ?>
				</div>
			</div>
		</div>
	</div>
</div>