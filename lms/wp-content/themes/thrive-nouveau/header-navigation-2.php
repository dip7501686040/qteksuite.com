<nav class="navbar navbar-default navbar-fixed-top navbar-style-2" id="thrive-bar">

	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div id="site-navbar-header" class="navbar-header">
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#thrive-main-navigation" aria-expanded="false">
	        <span class="sr-only">
	        	<?php esc_html_e('Toggle navigation', 'thrive-nouveau'); ?>
	        </span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>

	      <a id="site-brand" class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
      		<?php $logo_fallback = get_template_directory_uri() . '/logo.svg'; ?>
			<?php $logo_url = get_theme_mod( 'thrive_logo', esc_url( $logo_fallback ) ); ?>
			<img width="120px"  class="site-logo" src="<?php echo esc_url( $logo_url ); ?>" 
			alt="<?php bloginfo( 'title' ); ?>" />
	      </a>
	      
	      	<a href="#" class="light sidenav-toggle-control visible-xs" id="sidenav-toggle-mobile">
	      		<i class="material-icons">perm_identity</i>
	      	</a>

	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="thrive-main-navigation">
	      	
	      	<div id="sidebar-menu-toggle" class="navbar-left navbar-nav hidden-xs">
	      		<a href="#" class="light sidenav-toggle-control" id="sidenav-toggle">
	      			<i class="material-icons">menu</i>
	      		</a>
	      	</div>

	      	<?php
				$primary_nav_args = array(
	                'menu'              => 'primary',
	                'theme_location'    => 'primary',
	                'container'         => 'ul',
	                'container_class'   => 'collapse navbar-collapse',
	                'container_id'      => 'thrive-main-menu',
	                'menu_class'        => 'nav navbar-nav',
	                'fallback_cb'		=> false,
	                'echo'				=> false,
	                'walker'			=> new WP_Bootstrap_Navwalker()
	            );
	            $primary_menu = wp_nav_menu( $primary_nav_args );
            ?>
          	
            <?php if ( ! empty ( $primary_menu ) ) { ?>	
            	
            	<div id="site-main-menu" class="hidden-xs hidden-sm">
            		<?php echo thrive_sanity_check( $primary_menu ); ?>
            	</div>

            	<!-- Mobile Menu Toggle -->
            	<div class="main-menu-mobile-wrap-toggle-wrap visible-sm">
            		<a href="#" class="main-menu-mobile-show-button">
		            	<?php esc_html_e('Site Menu', 'thrive-nouveau'); ?>
		            	<i class="material-icons">add</i>
		            </a>
            	</div>
            	<!-- Mobile Menu Toggle End. -->

            <?php } else { ?>
            	<ul class="dropdown-menu thrive-navbar-main-menu">
            		<li>
            			<a href="<?php echo esc_url( admin_url('nav-menus.php?action=locations') ); ?>" title="<?php esc_attr_e('Add Primary Menu', 'thrive-nouveau'); ?>">
            				<i class="material-icons" style="font-size: 18px;">add</i>
            				<?php esc_html_e('Add Primary Menu', 'thrive-nouveau'); ?>
            			</a>
            		</li>
            	</ul>
            <?php } ?> 

	      	<ul id="user-navigation-actions" class="nav navbar-nav navbar-right">
	     	 	
      			<li class="hs2-search-icon">
      				<a href="#" id="header-style-2-search-toggle" class="hidden-xs">
      					<i class="material-icons">search</i> 
      				</a>
      				<div id="hs-2-form-section">
      					 <form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="navbar-search" 
      				 		class="navbar-form navbar-left" method="GET">
				        	<div class="form-group">
				          		<input name="s" autocomplete="off" type="search" class="form-control" placeholder="<?php esc_html_e('Search posts, groups, members, and etc', 'thrive-nouveau'); ?>" id="s">
				        	</div>
		        		</form>
		      		</div>
      			</li>

      			<li class="mobile-menu visible-xs">
	     	 		<!-- Mobile Menu Toggle -->
	            		<a href="#" class="main-menu-mobile-show-button">
			            	<?php esc_html_e('Site Menu', 'thrive-nouveau'); ?>
			            	<i class="material-icons">add</i>
			            </a>
	            	<!-- Mobile Menu Toggle End. -->
	     	 	</li>
	      			
      			<!--WooCommerce-->
	      		<?php if ( function_exists('wc_get_cart_url')) { ?>
	      		<li class="user-navigation-menu-option-item" id="wc-cart-total">
	      			<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" 
	      				title="<?php _e( 'View your shopping cart' ); ?>">
	      				<i class="material-icons">shopping_cart</i>
	      				<?php if (WC()->cart->get_cart_contents_count() >=1) { ?>
	      				<span class="thrive-user-nav-bubble">
	      					<?php echo WC()->cart->get_cart_contents_count(); ?>
	      				</span>
	      				<?php } ?>
	      			</a>
	      		</li>
	      		<?php } ?>
	      		<!--WooCommerce End-->

	      		<?php if ( is_user_logged_in() ) { ?>
	      			<?php thrive_user_nav(); ?>
	        	<?php } else { ?>
	        		<?php // Logged out user nav ?>
	        		<li>
	        			<a id="header-sign-in" href="<?php echo esc_url( wp_login_url() ); ?>" class="btn btn-default navbar-btn">
	        				<i class="material-icons">perm_identity</i> 
	        				<?php esc_html_e('Log In', 'thrive-nouveau'); ?>
	        			</a>
	        		</li>
	        		<?php if ( get_option('users_can_register') ) {?>
	        			<li>
	        				<a id="header-sign-up" href="<?php echo esc_url( wp_registration_url() ); ?>" 
	        				class="btn btn-default navbar-btn">
	        					<?php esc_html_e('Sign Up', 'thrive-nouveau'); ?>
	        				</a>
	        			</li>
	        		<?php } ?>
	        	<?php } ?>
	      	</ul>
	    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>