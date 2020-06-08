<?php 
$paged = (get_query_var('page')) ? get_query_var('page') : 1;

$args = [
    'post_type'         => 'last_news', 
    'posts_per_page'    => 9,
    'paged'             => $paged,
];

var_dump( $paged ); // i'm not on this page, see that? for some reason i'm on another page

$wp_query = new WP_Query( $args );

// allright i'm sure i'm on the right page/template

$counter = 1;
?>

<div class="menu-wrapper w-100 my-5">

    <div class=" d-flex flex-wrap">

        <?php
        while ($wp_query->have_posts()) : $wp_query->the_post(); 

            $excerpt = get_the_excerpt( $wp_query->ID );

            $short_excerpt = preg_match('/^([^.!?\s]*[\.!?\s]+){0,40}/', strip_tags( $excerpt ), $abstract );

            $short_excerpt = $abstract[0] . '[...]';
        ?>

            <article class="menu-card nieuws-card<?php if ( $counter >= 4 ){ echo' mt-5'; } else { echo''; } ?>">
                <a href="<?= esc_url( get_permalink( $wp_query->ID ) ); ?>">

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

  $total_pages = $wp_query->max_num_pages;
    $big = 999999999;
    echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '/page/%#%',
            'current' => $paged,
            'total' => $total_pages,
            'prev_text' => 'Vorige',
            'next_text' => 'Volgende'
        ));

        endwhile; ?>

    </div>
</div>