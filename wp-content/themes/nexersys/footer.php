                            </div>
			</div>
		</div>
		<!-- footer -->
		<footer id="footer">
			<div class="footer-holder">
				<div class="footer-frame">
					<div class="container_12">
						<!-- footer container -->
						<div class="footer-container">
							<?php if (is_active_sidebar('menus-sidebar')):?> 
                                                            <div class="links-box">
                                                                <?php dynamic_sidebar('menus-sidebar'); ?>	
                                                            </div>
                                                        <?php endif;?>
							<!-- item column -->
							<div class="item-col">
								<?php if (is_active_sidebar('social-sidebar')) dynamic_sidebar('social-sidebar'); ?>	
							</div>
						</div>
						<?php if (is_active_sidebar('footer-sidebar')):?> 
                                                    <div class="partner-box">
                                                            <div class="holder">
                                                                <?php dynamic_sidebar('footer-sidebar'); ?>	
                                                            </div>
                                                    </div>
                                                <?php endif;?>
					</div>
				</div>
			</div>
		</footer>
	</div>
	
	<!-- START Google Analytics -->

<script type="text/javascript">

var _gaq = _gaq || [];

_gaq.push(["_setAccount", "UA-26636109-1"]);

_gaq.push(['_setCustomVar', 1, "Timestamp", "<?php echo date_i18n('m/d/Y H:i'); ?>", 2]);

_gaq.push(['_setCustomVar', 2, "URL", "http:\/\/www.nexersys.com\/", 2]);

_gaq.push(["_trackPageview"]);



(function() {

   var ga = document.createElement("script");ga.type = "text/javascript";ga.async = true;

   ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";

   var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga, s);

})();

</script>

<!-- END Google Analytics -->

        <?php wp_footer(); ?>
</body>
</html>