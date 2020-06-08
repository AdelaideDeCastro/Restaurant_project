<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
'post_type'         => 'last_news', 
'posts_per_page'    => 9,
'paged'             => $paged,
];

$wp_query = new WP_Query( $args );

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
        endwhile; ?>

    </div>
</div>

<?php previous_posts_link('&laquo; Newer') ?>
<?php next_posts_link('Older &raquo;') ?>