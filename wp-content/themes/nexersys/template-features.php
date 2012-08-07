<?php
/*
Template Name: Template Features
*/
<?php include (TEMPLATEPATH . '/header-feature-tab.php'); ?>

<div style="width:1009px;overflow: auto;">

<div class="text-section">
	<div id="tabs" class="tabs-in" style="height: 700px;">
		<ul class="nav-tabs floatright" style="margin-right: 40px;">
			<li><a href="#features">Features</a><span></span></li>
			<li><a href="#benefits">Benefits</a><span></span></li>
			<li><a href="<?php bloginfo('template_directory');?>/compare.php">Compare</a><span></span></li>

		</ul><!-- nav-tabs -->

		<div class="clearboth"></div>

		<div class="tab features" id="features">
			<div class="holder">
				<ul class="labels floatleft">
					<li><a href="javascript:;" rel=".callout-01" class="legend" style="top: 5px;">19" LCD Monitor</a></li>
					<li><a href="javascript:;" rel=".callout-02" class="legend" style="top: 5px;">5 Unique Profiles</a></li>
					<li><a href="javascript:;" rel=".callout-03" class="legend">Performance <br />Feedback</a></li>
					<li><a href="javascript:;" rel=".callout-04" class="legend">Video &amp; Avatar<br /> Training</a></li>
					<li><a href="javascript:;" rel=".callout-05" class="legend">High Intensity <br />Interval Training</a></li>
					<li><a href="javascript:;" rel=".callout-06" class="legend">3 Programs with <br />Infinite Workouts</a></li>
					<li><a href="javascript:;" rel=".callout-07" class="legend">3-Axis<br /> Accelerometers</a></li>
					<li><a href="javascript:;" rel=".callout-08" class="legend">Commercial Grade<br /> Frame</a></li>
				</ul>
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/nexersys-frontview.png" width="265" height="409" class="floatleft" style="margin-left: 14px;" />

				<ul class="labels floatleft">
					<li><a href="javascript:;" rel=".callout-09" class="legend" style="top: 5px;">Custom Computer</a></li>
					<li><a href="javascript:;" rel=".callout-10" class="legend">Custom Music Tracks <br />&amp; Bluetooth Headset</a></li>
					<li><a href="javascript:;" rel=".callout-11" class="legend">Easy Glide Wheels &amp; <br />Ergonomic Handle</a></li>
					<li><a href="javascript:;" rel=".callout-12" class="legend" style="top: 5px;">Multi-Axis Pads</a></li>
					<li><a href="javascript:;" rel=".callout-13" class="legend" style="top: 5px;">Vertical Adjustment</a></li>
				</ul>
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/nexersys-sideview.png" width="283" height="409" class="floatleft" style="margin-left: 14px;" />

				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-01.png" class="callout-01 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-02.png" class="callout-02 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-03.png" class="callout-03 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-04.png" class="callout-04 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-05.png" class="callout-05 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-06.png" class="callout-06 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-07.png" class="callout-07 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-08.png" class="callout-08 invisible">
				
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-09.png" class="callout-09 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-10.png" class="callout-10 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-11.png" class="callout-11 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-12.png" class="callout-12 invisible">
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/callout-13.png" class="callout-13 invisible">
			</div>

			<div id="rollover-copy">
				<div class="callout-default">
					<h3>Nexersys Equipment</h3>
					Mouse over each feature to learn more about why our fitness equipment is the next generation exercise system.<br><br>
The Nexersys features make it stand out from all other home fitness systems. Nexersys, which sits on a commercial grade frame is<br/> built to handle punches and kicks. Nexersys features a 19” LCD Monitor to view the personal trainer and avatar training sessions.<br/>Nexersys allows users to create 5 unique profiles and detailed performance feedback so groups of users can train together and perfect<br/>their workouts and form. Since multiple users can use the same machine it can be vertically adjusted and easily moved on wheels throughout<br/>the home or gym. It is our goal to keep users engaged while training and have fun with our machine. Users can chose from custom music tracks<br/>and can hook up speakers to the machine for extra motivation, or users can put in a Bluetooth headset if you’re in a quiet setting.
				</div>

				<?php $i = 1 ?>
				<?php foreach ($arr as $k => $v): ?>
					<div class="callout-<?= str_pad($i++, 2, 0, STR_PAD_LEFT) ?> invisible">
						<h3><?= $k ?></h3>
						<?= $v ?>
					</div>
				<?php endforeach ?>
				<!--
				<div style="float:right;">
            	<a href="http://store.nexersys.com/Nexersys-iPower-Trainer-p/nxsh-01.htm"><img border="0" style="padding-right: 90px;" src="http://nexersys.com/wp-content/themes/nexersys/images/buynow.png"></a>
            	</div>--> 
				
			</div>
		</div>
		<div class="tab features" id="benefits">
			<div class="holder">
				<ul class="labels floatleft">
					<li><a href="javascript:;" rel=".callout-14" class="legend" style="top: 5px;">Personal Training</a></li>
					<li><a href="javascript:;" rel=".callout-15" class="legend" style="top: 5px;">Technique</a></li>
					<li><a href="javascript:;" rel=".callout-16" class="legend" style="top: 5px;">Competition</a></li>
					<li><a href="javascript:;" rel=".callout-17" class="legend" style="top: 5px;">Striking</a></li>
					<li><a href="javascript:;" rel=".callout-18" class="legend" style="top: 5px;">Resistance Training</a></li>
				</ul>
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/nexersys-frontview.png" width="265" height="409" class="floatleft" style="margin-left: 14px;" />

				<ul class="labels floatleft">
					<li><a href="javascript:;" rel=".callout-19" class="legend" style="top: 5px;">Cardio</a></li>
					<li><a href="javascript:;" rel=".callout-20" class="legend" style="top: 5px;">Fun to Share</a></li>
					<li><a href="javascript:;" rel=".callout-21" class="legend">High Intensity <br />Interval Training</a></li>
					<li><a href="javascript:;" rel=".callout-22" class="legend">Personalized <br />Feedback</a></li>
					<li><a href="javascript:;" rel=".callout-23" class="legend" style="top: 5px;">Gaming</a></li>
				</ul>
				<img src="<?php bloginfo('template_directory');?>/feature-tab-assets/images/nexersys/nexersys-sideview.png" width="283" height="409" class="floatleft" style="margin-left: 14px;" />
			</div>

			<div id="rollover-copy">
				<div class="callout-default">
					<h3>Nexersys Equipment</h3>
					Mouse over each feature to learn more about why our fitness equipment is the next generation exercise system.
		<br><br>
The Nexersys features make it stand out from all other home fitness systems. Nexersys, which sits on a commercial grade frame is<br/> built to handle punches and kicks. Nexersys features a 19” LCD Monitor to view the personal trainer and avatar training sessions.<br/>Nexersys allows users to create 5 unique profiles and detailed performance feedback so groups of users can train together and perfect<br/>their workouts and form. Since multiple users can use the same machine it can be vertically adjusted and easily moved on wheels throughout<br/>the home or gym. It is our goal to keep users engaged while training and have fun with our machine. Users can chose from custom music tracks<br/>and can hook up speakers to the machine for extra motivation, or users can put in a Bluetooth headset if you’re in a quiet setting.

				<?php $i = 1 ?>
				<?php foreach ($arr as $k => $v): ?>
					<div class="callout-<?= $i++ ?> invisible">
						<h3><?= $k ?></h3>
						<?= $v ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<!--<div class="tab compare" id="compare"> 
			<div class="holder"></div>
		</div>--> 
	</div>
</div>

<!-- END MAIN COPY -->
</div>
<!-- END GRAPH -->

		<div class="clear">&nbsp;</div>

<?php get_footer(); ?>
