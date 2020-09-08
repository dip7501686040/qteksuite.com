<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thrive
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
                                    <?php
                                        $archive_allowed_tags = array(
                                            'a' => array( 'href' => array(), 'title' => array() ),
                                            'span' => array( 'class' => array()  )
                                        );
                                    ?>

                                    <header class="page-header no-mg-top">

                                        <div class="reference-header-image">
                                            <?php reference_category_thumbnail(); ?>
                                        </div>

                                        <?php
                                            $archive_title = get_the_archive_title( '<h1 class="page-title">', '</h1>' );
                                            $archive_description = get_the_archive_description( '<div class="taxonomy-description">', '</div>' );
                                        ?>
                                        <div class="reference-header-info">

                                            <?php if ( empty ( $archive_title ) ) { ?>

                                                <h1 class="page-title">
                                                    <i class="material-icons md-24 md-dark">archive</i><?php _e( 'Archives', 'thrive-nouveau' ); ?>
                                                </h1>

                                            <?php } else { ?>
                                                <h1 class="page-title">
                                                <?php echo wp_kses( $archive_title, $archive_allowed_tags ); ?>
                                                </h1>
                                            <?php } ?>

                                            <?php echo wp_kses( $archive_description, 'post' ); ?>
                                        </div>
                                    </header><!-- .page-header -->

                                    <?php reference_search_form(); ?>

                                    <?php reference_child_categories(); ?>

                                    <?php reference_knowledgebase_count(); ?>

                                    <div id="reference-latest-articles">
                                    <?php /* Start the Loop */ ?>
                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                           <?php if ( has_post_thumbnail() ) { ?>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="magnific-popup">
                                                            <?php the_post_thumbnail('thrive-thumbnail'); ?>
                                                        </a>
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
                                    </div>

                                    <?php reference_navigation(); ?>

                                <?php else : ?>

                                    <?php get_template_part( 'knowledgebase', 'none' ); ?>

                                <?php endif; ?>
                            </div><!--.reference-main-wrapper-->
                        </main><!-- #main -->

                    </div><!-- #primary -->


                </div><!--col-md-8-->
           
           <div class="<?php echo esc_attr( $layout['sidebar'] ); ?>" id="content-right-col">
                <?php get_sidebar(); ?>
            </div><!--col-md-4-->

             </div><!--.row-->
        </div><!--#archive-section-->
    </div><!--#page-content-wrapper-->
</div>


<?php get_footer(); ?>
