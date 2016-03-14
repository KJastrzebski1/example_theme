<?php
get_header();?>

<div class="post">
    <div class="row post_title">
        
            <div class="col-sm-12">
                <h1><?php echo strtoupper(get_the_title()); ?></h1>
            </div>
        
    </div>
    <div class="row">
        
            <?php if (have_posts()) :
                ?>

                <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <?php dynamic_sidebar('sidebar_map');?>
        
        
    </div>
    
    
</div>

<?php get_footer(); ?>

