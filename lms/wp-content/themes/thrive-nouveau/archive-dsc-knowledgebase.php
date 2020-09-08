<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * PHP Version 5.4
 *
 * @category Reference
 * @package  Reference
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @version  GIT:github.com/codehaiku/reference
 * @link     github.com/codehaiku/reference
 * @since    1.0
 */

get_header(); ?>

<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">
  <div id="sidebar-wrap">
    <div id="sidebar-wrapper">
      <div id="page-sidenav" class="<?php echo thrive_layout_class('sidenav'); ?>">
        <div id="page-sidenav-section">
          <?php get_template_part( 'template-parts/sidebar', 'content' ); ?>
        </div>
      </div>
    </div>
  </div><!--#sidebar-wrao-->

  <div id="page-content-wrapper">

    <?php do_action( 'thrive_before_page_content' ); ?>
    <?php $layout = thrive_get_layout(); ?>

    <div id="archive-section" class="<?php echo esc_attr( $layout['layout'] ); ?>">
      <div class="row">
         <div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="reference-main-wrapper">

                        <?php reference_breadcrumb(); ?>

                        <?php if ( have_posts() ) : ?>

                            <?php reference_search_form(); ?>

                            <?php reference_archive_categories(); ?>

                            <?php reference_knowledgebase_count(); ?>

                            <div id="reference-latest-articles">

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class( array('dsc-knowledgebase') ); ?>>
                                       <?php if ( has_post_thumbnail() ) { ?>
                                           <div class="row">
                                               <div class="col-md-2">
                                                   <?php the_post_thumbnail('thumbnail'); ?>
                                               </div>
                                               <div class="col-md-10">
                                                    <div class="entry-meta">
                                                        <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                                        </a>
                                                    </div>
                                                    <div class="entry-content">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                               </div>
                                           </div>
                                       <?php } else { ?>
                                            <div class="row">
                                               <div class="col-md-12">
                                                    <div class="entry-meta">
                                                        <a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(the_title()); ?>">
                                                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                                        </a>
                                                    </div>
                                                    <div class="entry-content">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                               </div>
                                           </div>
                                       <?php } ?>
                                    </article><!-- #post-## -->

                                <?php endwhile; ?>

                            <?php reference_navigation(); ?>

                            </div><!--#reference-post-type-archive-loop-->

                        <?php else : ?>

                            <?php get_template_part('knowledgebase', 'none'); ?>

                        <?php endif; ?>

                    </div><!--.reference-main-wrapper-->
                </main><!-- #main -->
            </div><!-- #primary -->
          </div><!--col-md-8-->

        <div class="<?php echo esc_attr( $layout['sidebar'] ); ?>" id="content-right-col">
            <div id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar( esc_html__( 'Reference KNB', 'thrive-nouveau' ) ); ?>
            </div>
        </div>
        
      </div>
  </div><!--#page-content-wrapper-->
</div>
</div><!--#archive-section-->

<?php get_footer(); ?>
