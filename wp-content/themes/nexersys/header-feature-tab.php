<!DOCTYPE html>
<?php
$arr = array(		
	'19" LCD Monitor' => 'The 19" LCD monitor brings you video training, avatar gaming and performance stats to measure your workout success.',
	'5 Unique Profiles' => 'Up to 5 unique profiles capture each user’s name, age, weight, gender and preferred stance.',
	'Performance Feedback' => 'Custom feedback includes heart rate, accuracy, strike count, power and points.',
	'Video &amp; Avatar Training' => '80+ video training rounds bring personal training in strike, strike technique, core and cardio and an infinite number of avatar gaming rounds to keep every user on their toes.',
	'High Intensity Interval Training' => 'HIIT style training rounds bring you 3 minutes of intensity followed by a 1 minute rest.',
	'3 Programs with Infinite Workouts' => 'Three programs with infinite workout scenarios – Nexersys Training, Avatar Training and Custom Programs.',
	'3-Axis Accelerometers' => '3-axis accelerometers gather data from each strike pad and send it to the CPU for analysis.',
	'Commercial Grade Frame' => 'Commercial grade frame and pads professionally tested for over 1000 hours of continuous use.',
	'Custom Computer' => 'Full feature computer with custom Linux-based software.',
	'Custom Music Tracks &amp; Bluetooth Headset' => 'Dozens of custom Hip Hop, Rock, Techno and Pop music tracks were created to enhance each workout experience. Use the Wireless Bluetooth headset so you can direct the rockin’ music tracks and personal training direct to your ears only.',
	'Easy Glide Wheels &amp; Ergonomic Handle' => 'Ergonomic handle and easy glide wheels for easy movement around your home.',

	'Multi-Axis Pads' => 'Each pad swings on a multi-axis for straight strikes such as jabs, body shots and kicks as well as to each side for elbows,hooks, uppercuts,<br>knees and sweeps.',
	'Vertical Adjustment' => 'Shock assisted vertical adjustment allows each user to adjust the height just for them from 5’ to 6’4”.',
	'Personal Training' => 'Nexersys is your Personal Trainer delivering a unique and effective fitness experience each time you play.',
	'Technique' => 'In technique training, you will learn how to throw each strike using proper technique. You are taught by a personal trainer to UFC fighters and each move is demonstrated by our experienced athletes.',
	'Competition' => 'Nexersys provides a competitive platform for you and your friends to measure your work.',
	'Striking' => 'Intense strike and technique training means throwing 300 strikes in a round with the correct form making workouts more effective.',
	'Resistance Training' => 'Resistance training tones the core, arms and legs.',
	'Cardio' => 'Challenging cardio rounds burn calories, trim fat and help you get stronger, faster and quicker reaction time.',
	'Fun to Share' => 'Nexersys is fun to share, play and workout with family or friends.',
	'High Intensity Interval Training &nbsp;' => 'HIIT style training maximizes cardiovascular benefit and burns calories longer AFTER the workout is over.',
	'Personalized Feedback' => 'Nexersys provides personalized feedback on performance which will encourage you to keep playing to improve your skills, physical & mental conditioning.',
	'Gaming' => 'Nexersys utilizes gaming elements & environment to make Fitness Fun.',
);?>
	<head>
		<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/all.css"  />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/style.css"  />
		
                <script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.bt.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.ui.core.js"></script>




<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.skitter.min.js"></script>





<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.mousewheel-3.0.4.pack.js"></script><script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.fancybox-1.3.4.pack.js"></script>
<!--<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/common.js"></script>-->

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
					
		