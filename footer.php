
		<footer>
			<p>This is the footer of the theme</p>
			<div class="row">
				<div clss="col-xs-12">
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
								<?php wp_nav_menu(array('theme_location'=>'secondary','container'=>false,'menu_class' => 'nav navbar-nav navbar-left')); ?>
							</div>
					</nav>
				</div>
		</footer>

	</div><!-- end container -->

		<?php wp_footer(); ?>

	</body>
</html>
