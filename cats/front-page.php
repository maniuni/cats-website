<?php get_header(); ?>
        <title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/reset.css" type="text/css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
</head>
<body>
	<div class="wrapper">
		<nav>
                    <ul>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Main-image.png" alt="Шоши и Суми"/>
                        <?php wp_nav_menu( array( 'theme_location' => 'nav-menu','container' => false, 'items_wrap' => '<li>%3$s</li>','link_before' => '<span>',
	'link_after' => '</span>'));?>                         
                    </ul>
		</nav>
	</div>
<?php get_footer(); ?>