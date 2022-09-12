			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="container">

					<div class="row">
						<div class="col-md-6">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo-footer.png" class="logo-footer" alt="Logo">
							<p class="text-footer">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil magni labore eligendi, voluptatum placeat eos veritatis omnis consequuntur impedit nesciunt temporibus, quam nam! Similique, ipsum aperiam? Suscipit minima consectetur libero!</p>
						</div>
						<div class="col-md-3 p-left">

							<?php dynamic_sidebar("footer-2") ?>
						</div>
						<div class="col-md-3">
							<h3>Dirección</h3>
							<?php dynamic_sidebar("footer-3") ?>
						</div>
					</div>

					<!-- copyright -->
					<div class="copyright-container">
						<div class="copyright-content">

							<div class="copy-content">
								<?php
								printf(
									'<p class="copyright">' . __('&copy; %1$s %2$s. Powered by <a href="%3$s" title="Codev">Codev</a>') . '</p>',
									date('Y'),
									esc_html(get_bloginfo('name')),
									'//wordpress.org',
									'//html5blank.com'
								);
								?>
							</div>

							<div class="copy-content">
								<div class="social-footer">

									<ul class="social-nav-footer">
										<h5>Siguenos en:</h5>
										<li> <a href=""><i class="fa-brands fa-facebook"></i></a></li>
										<li> <a href=""><i class="fa-brands fa-instagram"></i></a></li>


									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</footer>


			



			</div>
			<!-- /wrapper -->

			<?php wp_footer(); ?>


			</body>

			</html>