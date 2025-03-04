<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>


    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1439799810108966');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1439799810108966&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


    <!-- Pinterest Tag -->
    <script>
        ! function(e) {
            if (!window.pintrk) {
                window.pintrk = function() {
                    window.pintrk.queue.push(Array.prototype.slice.call(arguments))
                };
                var
                    n = window.pintrk;
                n.queue = [], n.version = "3.0";
                var
                    t = document.createElement("script");
                t.async = !0, t.src = e;
                var
                    r = document.getElementsByTagName("script")[0];
                r.parentNode.insertBefore(t, r)
            }
        }("https://s.pinimg.com/ct/core.js");
        pintrk('load', '2614461586933', {
            em: '<user_email_address>'
        });
        pintrk('page');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid=2614461586933&pd[em]=<hashed_email_address>&noscript=1" />
    </noscript>
    <!-- end Pinterest Tag -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9HM1KC8R79"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9HM1KC8R79');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<?php wp_head(); ?>

<body <?php body_class(); ?>>

    <div class="bf-header-tag">
        Use o Cupom "fabrica" na 1° compra para 10% OFF
    </div>

    <header class="main-header sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">

                <div class="container d-flex justify-content-between">

                    <a class="navbar-brand" href="<?php bloginfo('home') ?>">
                        <img src="<?php bloginfo('template_url') ?>/img/logo-fabricadecarimbos.svg" alt="fabricadecarimbos.com.br" />
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                        ?>

                        <div class="header-right">

                            <form class="d-flex" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" value="<?php echo get_search_query(); ?>" name="s">
                                <button type="submit"><i class='bx bx-search'></i></button>
                            </form>

                            <a class="flag">
                                <img src="<?php bloginfo('template_url') ?>/img/br.svg" alt="Scafeli.com.br" />
                            </a>


                            <a class="myaccount-menu-item" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('Minha conta', 'woothemes'); ?>">
                                <i class='bx bx-user'></i> <span>Minha conta / Pedidos</span>
                            </a>


                            <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Meu carrinho'); ?>">

                                <i class='bx bx-cart-alt'></i>
                                <div class="cart-total-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></div> <?php echo WC()->cart->get_cart_total(); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header>