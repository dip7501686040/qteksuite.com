<?php
extract(
    shortcode_atts( 
        array(
            'posts_per_page' => 3,
        ), $atts 
    )
);

$args = array(
    'ignore_sticky_posts' => 'true',
    'posts_per_page' => $posts_per_page
);
?>

<?php $gears_rp_query = new WP_Query( $args ); ?>

<?php if ( $gears_rp_query->have_posts() ) { ?>
    
    <div class="gears-recent-posts-block">

        <?php while ( $gears_rp_query->have_posts() ) { ?>

            <?php $gears_rp_query->the_post(); ?>

            <?php get_template_part( 'template-parts/content', $gears_rp_query->get_post_format() ); ?>

        <?php } ?>
    
    </div><!--.gears-recent-posts-block-->
    
<?php } ?>