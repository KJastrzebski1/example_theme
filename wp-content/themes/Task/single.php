<?php get_header(); ?>

<div class="post">
    <div class="row post_title">
        <div class="post">
            <div class="col-sm-12">
                <img src="wp-content/themes/Task/assets/cloud.png" width="100%">
                
                <h1><?php echo strtoupper(get_the_title()); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-sm-7"><?php
            if (have_posts()) :
                ?>

                <?php while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>

        <div class="col-sm-5">
            <?php dynamic_sidebar('sidebar_post'); ?>
        </div>
    </div>
</div>

<?php
get_footer();
