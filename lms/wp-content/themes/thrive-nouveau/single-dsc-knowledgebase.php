<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package thrive
 */

get_header(); ?>
<div id="document-wrapper" class="<?php echo apply_filters('thrive-document-wrapper', 'thrive-document-wrapper'); ?>">

    <?php thrive_the_page_title(); ?>
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

        <div class="<?php echo esc_attr( $layout['layout'] ); ?>">

            <div class="row">

                <div id="content-left-col" class="<?php echo esc_attr( $layout['content'] ); ?>">

                    <div id="primary" class="content-area thrive-page-document reference-single">

                        <main id="main" class="site-main" role="main">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="reference-main-wrapper">

                                       <!--Show breadcrumbs-->
                                        <?php reference_breadcrumb(); ?>

                                        <header class="entry-header sr-only">
                                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content mg-top-35">
                                            <?php the_content(); ?>
                                            <div class="clearfix"></div>
                                            <?php
                                                wp_link_pages( array(
                                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thrive-nouveau' ),
                                                    'after'  => '</div>',
                                                ) );
                                            ?>
                                        </div><!-- .entry-content -->

                                        <footer class="entry-footer">
                                            <?php edit_post_link( esc_html__( 'Edit', 'thrive-nouveau' ), '<span class="edit-link">', '</span>' ); ?>
                                        </footer><!-- .entry-footer -->
                                    </div>
                                </article><!-- #post-## -->

                                <!-- Show the comments feedback -->
                                <?php reference_display_comment_feedback(); ?>

                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                ?>

                            <?php endwhile; // End of the loop. ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!--.col-md-8-->

                <div id="content-right-col" class="<?php echo esc_attr( $layout['sidebar'] ); ?>">
                    <div id="thrive-ref-toc-wrap">
                        <div id="thrive-ref-toc-content-title">
                            <h3>
                                <?php esc_html_e('Table of Contents', 'thrive-nouveau'); ?>
                            </h3>
                        </div>
                        <div id="thrive-ref-toc-content-wrap">
                            <?php do_action('reference_has_table_of_content_before'); ?>
                            <?php do_action('reference_single_content_before'); ?>
                            <?php do_action('reference_single_content_after'); ?>
                            <?php do_action('reference_has_table_of_content_after'); ?>
                        </div>
                    </div>
                    <div id="secondary" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( esc_html__( 'Reference KNB', 'thrive-nouveau' ) ); ?>
                    </div>

                </div><!--.col-md-4-->
            </div><!--.row-->
        </div>
    </div><!--#page-content-wrapper-->
</div>

<?php get_footer(); ?>
