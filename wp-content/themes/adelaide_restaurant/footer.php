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
                
                <!-- <div class="col-lg-4">
                    <h3>Reserveren</h3>
                    <div class="link-reservatin mt-4">
                        <a href="contact.html" class="text-secondary">Reserveren</a>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="footer-wrapper-bottom mt-5">
            <div class="d-flex">
                <ul class="list-unstyled d-lg-flex  justify-content-lg-start align-items-lg-center mr-auto mb-0">
                    <li>Adelaide De Castro</li>
                    <li>Copyright</li>
                    <li>|
                        <a href="#" target="_blank" class="text-white">Privacy</a>
                    </li>
                </ul>
                <ul class="list-unstyled d-lg-flex justify-content-lg-end align-items-lg-center mb-0">
                    <li>
                        <a href="https://www.thefork.nl/restaurant/bacco-perbacco/240697" target="_blank" class="text-white">
                            Iens
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tripadvisor.com/Restaurant_Review-g188633-d3294162-Reviews-Bacco_Perbacco_Cucina_Italiana-The_Hague_South_Holland_Province.html" target="_blank" class="text-white">
                            <span class="icon"><i class="fab fa-tripadvisor"></i></span></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/ristorante.baccoperbacco" target="_blank" class="text-white">
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