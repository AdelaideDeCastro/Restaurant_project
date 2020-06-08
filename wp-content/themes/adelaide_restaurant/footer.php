<footer class="pt-4 pb-1">
    <div class="container">
        <div class="footer-wrapper-top">
            <div class="row">

                <?php
                global $wp_registered_sidebars;

                $sidebar_count = count( $wp_registered_sidebars );

                for ( $i = 1; $i <= $sidebar_count; $i ++ ) { ?>

                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'footer-' . $i ); ?>
                    </div>
                    <?php

                }
                ?>
    
            </div>
        </div>
        <div class="footer-wrapper-bottom mt-5">
            <div class="d-flex">
                <ul class="list-unstyled d-lg-flex  justify-content-lg-start align-items-lg-center mr-auto mb-0">
                    <li>Adelaide De Castro</li>
                    <li><i class="far fa-copyright"></i> Copyright</li>
                    <li>|</li>
                    <li>
                        <a href="#" target="_blank" class="text-white">Privacy</a>
                    </li>
                </ul>
                <ul class="list-unstyled d-lg-flex justify-content-lg-end align-items-lg-center mb-0">
                    <li>
                        <a href="<?= esc_attr( get_option( 'iens_handler' ) ); ?>" target="_blank" class="text-white">
                            Iens
                        </a>
                    </li>
                    <li>
                        <a href="<?= esc_attr( get_option( 'tripadvisor_handler' ) ); ?>" target="_blank" class="text-white">
                            <span class="icon"><i class="fab fa-tripadvisor"></i></span></a>
                    </li>
                    <li>
                        <a href="<?= esc_attr( get_option( 'facebook_handler' ) ); ?>" target="_blank" class="text-white">
                            <span class="icon"><i class="fab fa-facebook-f"></i></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</footer>

<?php
wp_footer();
?>

</body>
</html>