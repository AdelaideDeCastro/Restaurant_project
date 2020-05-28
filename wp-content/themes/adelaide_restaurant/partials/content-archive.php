<?php

$paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

$args = [
    'post_type'=> 'news',
    'posts_per_page'=> '9',
    'paged' => $paged,
];

$news = null;

$news = new WP_Query( $args );

$counter = 1;

if ( $news->have_posts() ) : ?>

    <div class="menu-wrapper w-100 my-5">

        <div class=" d-flex flex-wrap">

            <?php
            while ( $news->have_posts() ) :
        
                $news->the_post(); 

                $excerpt = get_the_excerpt( $news->ID );

                $short_excerpt = preg_match('/^([^.!?\s]*[\.!?\s]+){0,40}/', strip_tags($excerpt), $abstract );

                $short_excerpt = $abstract[0] . '[...]';
                ?>

                <article class="menu-card nieuws-card<?php if ( $counter >= 4 ){ echo' mt-5'; } else { echo''; } ?>">
                    <a href="<?= esc_url( get_permalink( $news->ID ) ); ?>">

                        <?php
                        if ( $counter % 2 ) { ?>
                    
                            <div class="menu-slick-img bg-img bg-img-menu-1" style="background-image: url(' <?= the_post_thumbnail_url( 'full' ); ?> ');"></div>
                            <div class="slick-content text-center">
                                <p style="margin-bottom: 6px;"><?= the_date( 'd/m/Y' ); ?></p>
                                <h2 class="text-primary mb-3"><?= the_title(); ?></h2>
                                <?= $short_excerpt; ?>
                            </div>

                        <?php
                        } else { ?>

                            <div class="slick-content text-center">
                                <p style="margin-bottom: 6px;"><?= the_date( 'd/m/Y' ); ?></p>
                                <h2 class="text-primary mb-3"><?= the_title(); ?></h2>
                                <?= $short_excerpt; ?>
                            </div>
                            <div class="menu-slick-img bg-img bg-img-menu-1" style="background-image: url(' <?= the_post_thumbnail_url( 'full' ); ?> ');"></div>

                        <?php
                        }
                        ?>
                    </a>
                </article>
        
            <?php
            $counter++;

            endwhile;

            
            ?>



            

        </div>

    </div>


<div class="pagination text-center">
    
    <?php
    echo get_previous_posts_link( '<span class="icon slick-arrow-left" style="cursor:pointer;vertical-align:sub;padding-left:6px;"><i class="fas fa-angle-left"></i></span>' );

    echo paginate_links( array(
            'total' => $news->max_num_pages,
            'mid_size' => 2,
            'prev_text'=> '',
            'next_text' => '',
    ));
    echo get_next_posts_link( '<span class="icon slick-arrow-right" style="cursor:pointer;vertical-align:sub;padding-right:6px;"><i class="fas fa-angle-right"></i></span>', $news->max_num_pages );
    ?> 
    
</div>


<div class="next-prev-wrap">



</div>
            <!-- <div class="pagination"><?= the_posts_pagination(); ?></div> -->

            <?php
endif;

wp_reset_postdata();
?>