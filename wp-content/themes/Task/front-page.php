<?php get_header(); ?>
<div class="row">
    <div class="slider">
        <br>
        <?php
        $array = ['post_type' => ['slider-post']];
        $query = new WP_Query($array);
        ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                
                
                <?php
                $num = $query->post_count;
                for ($i = 1; $i < $num; $i++) { ?>
                   <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class></li>
                <?php  } ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php if ($query->have_posts()) : ?>
                    <div class="item active">
                        <?php $query->the_post(); ?>
                        <?php echo the_post_thumbnail('large'); ?>
                        <div class="carousel-caption">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>


                        <div class="item">
                            <?php echo the_post_thumbnail('large'); ?>
                            <div class="carousel-caption">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>

                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
</div>
    <div class="row">
        <div class="col-sm-8" id="articles">
            <?php
            $array = ['post__in' => [5, 7, 9]];
            $query = new WP_Query($array);
            if ($query->have_posts()) :
                ?>

                <!-- pagination here -->

                <!-- the loop -->
                <?php while ($query->have_posts()) : $query->the_post(); ?>


                    <div class="col-sm-6">
                        <article>
                            <h2><?php the_title(); ?></h2>
                            <?php echo get_the_post_thumbnail(); ?>
                            <div class="content"><?php the_excerpt(); ?></div>
                            <a href="<?php echo get_permalink(); ?>" class="btn">Learn more</a>
                        </article>
                    </div>


                <?php endwhile; ?>
                <!-- end of the loop -->

                <!-- pagination here -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div>
                <?php dynamic_sidebar('sidebar'); ?>
            </div>
        </div>
    </div>



    <?php get_footer(); ?>