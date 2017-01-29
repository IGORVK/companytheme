<?php global $mytheme; ?>
<?php
/*The header for Theme Company*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <!--[if gte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo(template_url); ?>/css/ie.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="loader">
    <div class="loader_inner"></div>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'company' ); ?></a>

	<header>
			<!-- Fixed NavBar-->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">

						<button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo(template_url); ?>/images/logo.png" alt=""></a>

					</div>
					<div class="wrap-connection">
						<div class="connection">
							<button type="button" class="btn btn-default navbar-btn inquire" data-toggle="modal" data-target="#myModal">Inquire</button>

							<div class="company-header-phone">
								<a href="tel:<?php echo $mytheme['phone']; ?>"><?php echo $mytheme['phone']; ?></a>
							</div>
						</div>
					</div>


					<div id="navbar" class="navbar-collapse collapse">

						<?php wp_nav_menu(array('theme_location' => 'menu', 'menu_class'=>'nav navbar-nav', 'container'=>'ul', 'menu_id'=>'menu-header-menu')); ?>

					</div><!--/.nav-collapse -->
				</div>
			</nav>
			<!-- /.fixed navbar -->
	</header><!-- #masthead -->

<!--<div id="content" class="site-content">-->