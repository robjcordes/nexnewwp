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
        <?php wp_footer(); ?>
</body>
</html>