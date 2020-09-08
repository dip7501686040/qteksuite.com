<nav class="navbar navbar-default navbar-fixed-top header-navigation-1" id="thrive-bar">

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

	      	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="navbar-search" class="navbar-form navbar-left " method="GET">
	        	<div id="header-search-wrap" class="form-group">
	          		<input name="s" type="search" autocomplete="off" class="form-control" placeholder="<?php esc_html_e('Search posts, groups, members, and etc', 'thrive-nouveau'); ?>" id="s">
	          		<i class="material-icons" id="header-search-icon">search</i>
	        	</div>
	      	</form>

	      	<ul id="user-navigation-actions" class="nav navbar-nav navbar-right">
	      		
      			<li class="user-navigation-menu-option-item dropdown <?php echo ! is_user_logged_in() ? 'mg-right-15': ''; ?>">
      					
        			<?php
        				$primary_nav_args = array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'container'         => 'ul',
			                'container_class'   => 'thrive-navigation-class',
			                'container_id'      => 'thrive-main-menu',
			                'menu_class'        => 'dropdown-menu thrive-navbar-main-menu',
			                'fallback_cb'		=> false,
			                'echo'				=> false
			            );
			            $primary_menu = wp_nav_menu( $primary_nav_args );
		            ?>
		            <a href="#" class="main-menu-mobile-show-button visible-xs">
		            	<?php esc_html_e('Site Menu', 'thrive-nouveau'); ?>
		            	<i class="material-icons">add</i>
		            </a>
		            <?php if ( ! empty ( $primary_menu ) ) { ?>
		            	<a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	        				<i class="material-icons">apps</i>
	        			</a>
		            	<?php echo thrive_sanity_check( $primary_menu ); ?>
		            <?php
		            } else { ?>
		            	<ul class="dropdown-menu thrive-navbar-main-menu">
		            		<li>
		            			<a href="<?php echo esc_url( admin_url('nav-menus.php?action=locations') ); ?>" title="<?php esc_attr_e('Add Primary Menu', 'thrive-nouveau'); ?>">
		            				<i class="material-icons" style="font-size: 18px;">add</i>
		            				<?php esc_html_e('Add Primary Menu', 'thrive-nouveau'); ?>
		            			</a>
		            		</li>
		            	</ul>
		            <?php } ?> 
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
	      				<span class="visible-xs">
	      					<?php esc_html_e('Shopping Cart', 'thrive-nouveau'); ?>
	      				</span>
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

