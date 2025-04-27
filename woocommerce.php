<?php

/**
 * Template principal para páginas do WooCommerce
 */

get_header();
?>

<div class="content content-woocommerce">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (function_exists('woocommerce_content')) {
                    woocommerce_content();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>