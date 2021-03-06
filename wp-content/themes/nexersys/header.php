<!DOCTYPE html>
	<head>
		<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/all.css"  />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/style.css"  />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'theme-comment-reply', get_bloginfo('template_url')."/js/comment-reply.js" ); ?>
		
		<?php wp_enqueue_script('jquery'); wp_head(); ?>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js" ></script>
		


	</head>
	<body>
		<div id="wrapper">
			<div class="w1">
				<div class="w2">
					<div class="container_12">
						<div class="grid_12">
							<div class="panel-box">
								<?php if (is_active_sidebar('default-sidebar')) dynamic_sidebar('default-sidebar'); ?>	
								<?php get_search_form(); ?>
							</div>
						</div>
						<div class="clear">&nbsp;</div>
						<header id="header">
							<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
							<?php wp_nav_menu( array('container' => 'nav',
										 'container_id' =>'nav',
										 'theme_location' => 'primary',
										 'menu_class' => '') ); ?>
						</header>
					
		