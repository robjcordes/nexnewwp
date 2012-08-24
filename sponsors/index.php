<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sponsor Flip Wall With jQuery &amp; CSS | Tutorialzine demo</title>

<link rel="stylesheet" type="text/css" href="styles.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</head>

<body>

<?php

// Each sponsor is an element of the $sponsors array:

$sponsors = array(
	array('ncis','NCIS: Los Angeles','http://nxs.la/H9YGir'),
	array('popularscience','Ways to Help You Sweat Smarter','http://nxs.la/A72jNj'),
	array('mancaves','Dojo Episode Airing Spring 2012','http://nxs.la/H37BEe'),
	array('fox7austin','Workout with the Nexersys','http://goo.gl/kZY4e'),
	array('austinfit','Nexersys Delivers a Knockout','http://nxs.la/zbJRRk'),
//	array('atx_businessjournal','Startup Wants to be the Next Bowflex','http://nxs.la/xDbyaI'),
	array('keyetv','KEYE TV NEWS - Fred Cantu','http://nxs.la/LRquhM'),
//	array('antfarm','A.N.T Farm','Coming soon!'),
	array('sofreakingcool','Nexersys MMA Trainer for UFC Pugilists','http://nxs.la/y8IEC9'),
	array('hh_logo','Avatar Shadow Boxing','http://nxs.la/zaoa4X'),
	array('prnewswire','PR Newswire - May 8, 2012','http://nxs.la/JfYi4B'),
);

$social = array(
	array('blog','Nexersys Blog','http://nxs.la/IR1iGh'),
	array('facebook','Nexersys FB Page','http://nxs.la/KFSdT6'),
	array('twitter','Follow Us','http://nxs.la/IJC7Sa'),
	array('flickr','Nexersys Gallery','http://nxs.la/Kbl8gw'),
	array('youtube','Nexersys Videos','http://nxs.la/IJCsUS'),
	

);


// Randomizing the order of sponsors:

shuffle($sponsors);

?>



<div id="main">

	<div class="sponsorListHolder">

		
        <?php
			
			// Looping through the array:
			
			foreach($sponsors as $company)
			{
				echo'
				<div class="sponsor" title="Click to flip">
					<div class="sponsorFlip">
						<img src="img/sponsors/'.$company[0].'.png" alt="More about '.$company[0].'" />
					</div>
					
					<div class="sponsorData">
						<div class="sponsorDescription">
							'.$company[1].'
						</div>
						<div class="sponsorURL">
							<a href="'.$company[2].'" rel="nofollow" target="_blank">'.$company[2].'</a>
						</div>
					</div>
				</div>
				
				';
			}
		
		?>


         <?php

    			// Looping through the array:

    			foreach($social as $company)
    			{
    				echo'
    				<div class="sponsor" title="Click to flip">
    					<div class="sponsorFlip">
    						<img src="img/sponsors/'.$company[0].'.png" alt="More about '.$company[0].'" />
    					</div>

    					<div class="sponsorData">
    						<div class="sponsorDescription">
    							'.$company[1].'
    						</div>
    						<div class="sponsorURL">
    							<a href="'.$company[2].'" rel="nofollow" target="_blank">'.$company[2].'</a>
    						</div>
    					</div>
    				</div>

    				';
    			}

    		?>

        
        
    	<div class="clear"></div>
    </div>

</div>

</body>
</html>
