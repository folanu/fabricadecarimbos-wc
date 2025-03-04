<?php

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Rename "home" in breadcrumb
 */
add_filter('woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text');
function wcc_change_breadcrumb_home_text($defaults)
{
    $defaults['home'] = '';
    return $defaults;
}

/**
 * Change the breadcrumb separator
 */
add_filter('woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter');
function wcc_change_breadcrumb_delimiter($defaults)
{
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = ' ─ ';
    return $defaults;
}



// move category description to bottom of pages
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_taxonomy_archive_description', 100);



/**
 * Display category image on category archive
 */
add_action('woocommerce_archive_description', 'woocommerce_category_image', 1);
function woocommerce_category_image()
{
    if (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        if ($image) {
            echo '<div class="img-category-page"><img src="' . $image . '" alt="' . $cat->name . '" /></div>';
        }
    }
}



add_filter('wp_get_attachment_image_attributes', 'change_attachement_image_attributes', 20, 2);

function change_attachement_image_attributes($attr, $attachment)
{
    // Get post parent
    $parent = get_post_field('post_parent', $attachment);

    // Get post type to check if it's product
    $type = get_post_field('post_type', $parent);
    if ($type != 'product') {
        return $attr;
    }

    /// Get title
    $title = get_post_field('post_title', $parent);

    $attr['alt'] = $title;
    $attr['title'] = $title;

    return $attr;
}






function antihype_theme_support()
{
    add_theme_support('title-tag');
}


add_action('after_setup_theme', 'antihype_theme_support');


function load_stylesheets()
{
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');

    wp_register_style('custom', get_template_directory_uri() . '/css/styles.css', '', 1, 'all');
    wp_enqueue_style('custom');
}


add_action('wp_enqueue_scripts', 'load_stylesheets');






add_filter('woocommerce_account_menu_items', 'misha_remove_my_account_links');
function misha_remove_my_account_links($menu_links)
{

    unset($menu_links['downloads']); // Disable Downloads

    return $menu_links;
}


add_filter('woocommerce_account_menu_items', 'misha_rename_downloads');

function misha_rename_downloads($menu_links)
{

    $menu_links['dashboard'] = 'Início';
    $menu_links['orders'] = 'Meus pedidos';
    $menu_links['edit-account'] = 'Dados de acesso';
    $menu_links['edit-address'] = 'Meu endereço';
    // $menu_links['downloads'] = 'My Files';

    return $menu_links;
}



// Add support
add_theme_support('menus');
register_nav_menus(
    array(
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu',
    )
);

add_theme_support('post-thumbnails');
add_image_size('post_image', 1200, 1200, false);


function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


// display an 'Out of Stock' label on archive pages
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10);
function woocommerce_template_loop_stock()
{
    global $product;
    if (!$product->managing_stock() && !$product->is_in_stock())
        echo '<p class="stock out-of-stock">esgotado</p>';
}


add_filter('woocommerce_sale_flash', 'ds_change_sale_text');
function ds_change_sale_text()
{
    return '<span class="onsale">Sale</span>';
}

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Ver carrinho'); ?>"><img src="<?php bloginfo('template_directory') ?>/img/cart.svg" class="fluid-img" alt="">
        <div class="cartcounter"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?> </div>
    </a>

<?php
    $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}


add_action('after_setup_theme', 'yourtheme_setup');

function yourtheme_setup()
{
    // add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}





/**
 * @snippet     Order product collections by stock status, instock products first.
 * @author      Rkoms
 */

class iWC_Orderby_Stock_Status
{

    public function __construct()
    {
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            add_filter('posts_clauses', array($this, 'order_by_stock_status'), 2000, 2);
        }
    }

    public function order_by_stock_status($posts_clauses, $query)
    {
        global $wpdb;
        if ($query->is_main_query() && is_woocommerce() && (is_shop() || is_product_category() || is_product_tag())) {
            $posts_clauses['join'] .= " INNER JOIN $wpdb->postmeta istockstatus ON ($wpdb->posts.ID = istockstatus.post_id) ";
            $posts_clauses['orderby'] = " istockstatus.meta_value ASC, " . $posts_clauses['orderby'];
            $posts_clauses['where'] = " AND istockstatus.meta_key = '_stock_status' AND istockstatus.meta_value <> '' " . $posts_clauses['where'];
        }
        return $posts_clauses;
    }
}
new iWC_Orderby_Stock_Status;



/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 4; // 3 products per row
    }
}





add_filter('woocommerce_shortcode_products_query', function ($query_args, $atts, $loop) {

    if ($atts['class'] == 'outofstock') {
        $query_args['meta_query'] = array(array(
            'key'     => '_stock_status',
            'value'   => 'outofstock',
            'compare' => 'NOT LIKE',
        ));
    }


    return $query_args;
}, 10, 3);


// Adiciona um campo de texto rico ao formulário de edição de produto (Editor Clássico)
function custom_product_editor_custom_field()
{
    $product_id = get_the_ID();
    $custom_field = get_post_meta($product_id, '_custom_product_field', true);

    echo '<div class="options_group">';

    wp_editor(
        $custom_field, // Valor salvo
        'custom_product_field',
        array(
            'textarea_name' => 'custom_product_field',
            'label'         => __('Informações Adicionais', 'text-domain'),
            'desc_tip'      => 'true',
            'description'   => __('Adicione informações adicionais sobre o produto aqui.', 'text-domain'),
            'editor_class'  => 'custom-product-field',
        )
    );

    echo '</div>';
}

// Salva o valor do campo personalizado
function custom_save_product_custom_field($post_id)
{
    $custom_field = $_POST['custom_product_field'] ?? '';
    update_post_meta($post_id, '_custom_product_field', wp_kses_post($custom_field));
}

// Adiciona o campo de texto rico ao formulário de edição de produto
add_action('woocommerce_product_options_general_product_data', 'custom_product_editor_custom_field');

// Salva o valor do campo personalizado ao salvar o produto
add_action('woocommerce_process_product_meta', 'custom_save_product_custom_field');

// Exibe o conteúdo do campo personalizado na página do produto
function custom_display_product_custom_field()
{
    $custom_field = get_post_meta(get_the_ID(), '_custom_product_field', true);

    if ($custom_field) {
        // echo '<div class="custom-product-field-content">' . apply_filters('the_content', $custom_field) . '</div>';
    }
}

// Adiciona o conteúdo do campo personalizado antes das avaliações na página do produto
add_action('woocommerce_before_single_product', 'custom_display_product_custom_field', 2);



// add_action('woocommerce_after_shop_loop_item_title', 'mostrar_tag_esgotado', 10);
// function mostrar_tag_esgotado()
// {
//     global $product;

//     // Verifica se o produto está fora de estoque
//     if (!$product->is_in_stock()) {
//         echo '<span class="tag-esgotado">' . esc_html__('Esgotado', 'seu-tema') . '</span>';
//     }
// }





add_action('woocommerce_before_shop_loop_item_title', 'add_on_hover_shop_loop_image');

function add_on_hover_shop_loop_image()
{

    $image_id = wc_get_product()->get_gallery_image_ids()[0];

    if ($image_id) {

        echo wp_get_attachment_image($image_id);
    } else {  //assuming not all products have galleries set

        echo  bloginfo('template_url');
    }
}



add_theme_support('woocommerce', apply_filters('storefront_woocommerce_args', array(
    'single_image_width' => 800,
    'thumbnail_image_width' => 800,
    'product_grid' => array(
        'default_columns' => 3,
        'default_rows' => 4,
        'min_columns' => 1,
        'max_columns' => 6,
        'min_rows' => 1
    )
)));







add_filter('gettext', 'alterar_texto_proceed_to_checkout', 20, 3);
function alterar_texto_proceed_to_checkout($translated_text, $text, $domain)
{
    if ($text === 'Proceed to checkout' && 'woocommerce' === $domain) {
        $translated_text = 'Ir para o pagamento';
    }
    return $translated_text;
}
