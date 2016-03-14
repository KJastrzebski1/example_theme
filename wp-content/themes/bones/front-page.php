<?php get_header();?>
            <div class="row">
                <div id="top">
                    <div class="col-sm-6">
                        <?php
                        $array = ['post__in' => [1]];
                        $query = new WP_Query($array);
                        if ($query->have_posts()) :
                            ?>

                            <!-- pagination here -->

                            <!-- the loop -->
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                
                                    <h2><?php the_title(); ?></h2>
                                    <?php echo get_the_post_thumbnail(); ?>
                                    <p><?php the_content(); ?></p>
                                
                            <?php endwhile; ?>
                            <!-- end of the loop -->

                            <!-- pagination here -->

                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php dynamic_sidebar('sidebar'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $array = ['post__in' => [12, 5, 10]];
                $query = new WP_Query($array);
                if ($query->have_posts()) :
                    ?>

                    <!-- pagination here -->

                    <!-- the loop -->
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-sm-4">
                            <h2><?php the_title(); ?></h2>
                            <?php echo get_the_post_thumbnail(); ?>
                            <p><?php the_content(); ?></p>
                        </div>
    <?php endwhile; ?>
                    <!-- end of the loop -->

                    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>




            </div>

