</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.content-wrapper -->
</div><!-- /.page-wrap -->
	
	<?php
		get_template_part('template-files/footer', 'widget');
	?>
    <footer class="site-footer">
		<div class="site-copyright">
				<?if(function_exists(site_copyright)):
					site_copyright();
				else:
				?>
				<span><?php printf(__('%1$s', 'profism'), '<a href="https://themeworx.net" >&copy; Themeworx</a>'); ?></span>
				<?php endif; ?>
			<div class="to-top">
				<i class="fa fa-angle-up"></i>
			</div>
		</div>
    </footer><!-- /.site-footer -->
	
	<?php wp_footer(); ?> 
  </body>
</html>