<?php

$custom_query_args = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;

$args = [
    'post_type'         => 'last_news',
    'posts_per_page'    => 9,
    'paged'             => $custom_query_args,
];

$news = new WP_Query( $args );

$counter = 1;

if ( $news->have_posts() ) : ?>

    <div class="menu-wrapper w-100 my-5">

        <div class=" d-flex flex-wrap">

            <?php
            while ( $news->have_posts() ) :
        
                $news->the_post(); 

                $excerpt = get_the_excerpt( $news->ID );

                $short_excerpt = preg_match('/^([^.!?\s]*[\.!?\s]+){0,40}/', strip_tags( $excerpt ), $abstract );

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

    <?php
    if ( $news->max_num_pages > 1 ) { ?>

        <div class="pagination text-center">

            <?php
            $big = 999999999;

            echo paginate_links( array(
                'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'       => '?paged=%#%',
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'total'        => $news->max_num_pages,
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i class="fas fa-angle-left"></i> %1$s', __( '', 'text-domain' ) ),
                'next_text'    => sprintf( '%1$s <i class="fas fa-angle-right"></i>', __( '', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
           ?>

        </div>

    <?php
    }
                    
endif;

wp_reset_postdata();
?>