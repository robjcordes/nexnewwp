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
);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/feature-tab-assets/css/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/feature-tab-assets/css/reset.css" media="screen" />
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
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/feature-tab-assets/js/common.js"></script>

<?php
    /*
     *  Add this to support sites with sites with threaded comments enabled.
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
 
    wp_head();
 
    wp_get_archives('type=monthly&format=link');
?>

</head>
<body>
<div id="wrapper">

    <div id="header">
<div id="topbar">
<a href="http://nexersys.com/apply-for-financing"><img src="<?php bloginfo('template_directory');?>/images/financing_button.png" width="229px" height="34px" border="0" style="float: left;"></a>
<img src="<?php bloginfo('template_directory');?>/images/twitter-icon.png" border="0" width="33px" height="25px" style="float:left;padding-left:10px;margin-top:2px;">


<div id="twitter_div"><ul id="twitter_update_list"><li><a href="https://twitter.com/#!/sonnench" target="_blank">chael sonnen</a> 
I speak for Nexersys. Get off ur couch. Get in shape. Andy wants to fatten u on burgers so he can feel better abt himself. Don't let him win</li></ul></div>

                 <div style="float:right;">
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
	<table border="0" cellpadding="0" cellspacing="0" style="margin-top: 4px;margin-right: 4px;">
	<tr>
	<td>
        <input type="text" value="" placeholder="Search Our Site" name="s" id="s" style="margin-right: 10px;" />
	</td>
	<td>
        <input type="image" id="searchsubmit" value="Search" src="<?php bloginfo('template_directory');?>/images/search.png" />
	</td>
	</tr>
	</table>
    </div>
</form>

                 </div>
            </div><!-- END topbar div -->

            <div id="header-main">

<a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_directory');?>/images/logo-simple.png" width="303px" height="67px" border="0" style="padding: 0px 30px 12px 40px;border:none;"></a>
<a href="http://store.nexersys.com/Nexersys-iPower-Trainer-p/nxsh-01.htm"  target="_blank"><img src="<?php bloginfo('template_directory');?>/images/buynow.png" border="0" width="109px" height="100px"></a>
<a href="#" onclick="return SnapABug.startLink();"><img src="<?php bloginfo('template_directory');?>/images/livechat_header.png" border="0" width="243px" height="100px"></a>

<a rel=”nofollow” href="http://www.popsci.com/gadgets/gallery/2011-12/sweat-smarter?image=1" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/featured_header.png" width="268px" height="99px" border="0" style="float:right;"></a>

            </div>

    </div>

<?php
wp_nav_menu( array( 'theme_location' => 'top-nav' , 'container_class' => 'menu-header' ) );
?>