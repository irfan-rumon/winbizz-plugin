<?php
/**
 * Plugin Name: Winbiz Slider
 * Description: Winbiz slider widget for elementor
 * Version:     1.0.0
 * Author: Brain Station  23
 * Author URI: https://brainstation-23.com/?bc
 */

//Defined constants
define('WINBIZ_PLUGIN_DOMAIN', 'elementor-addon');
define('WINBIZ_SLIDER_POST_TYPE', 'Winbiz Slider');
define('WINBIZ_SLIDER_CUSTOM_FIELD_EDITOR', 'ws_editor_name');
define('WINBIZ_SLIDER_CUSTOM_FIELD_PRICE', 'ws_price');

function register_slider_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/slider.php');
    $widgets_manager->register(new \Slider());
}

function frontend_styles()
{
    wp_register_style('slider_style', plugins_url('assets/css/slider_style.css', __FILE__));
    wp_enqueue_style('slider_style');
}

// First things first we are going to create custom post type
add_action('init', function () {
    register_post_type(WINBIZ_SLIDER_POST_TYPE, [
        'label' => WINBIZ_SLIDER_POST_TYPE,
        'public' => true,
        'supports' => ['title', 'thumbnail'],
        'show_in_menu' => 'edit.php',
        'taxonomies' => array('category'),
        'has_archive' => true,
    ]);
});

function ws_metabox_mutiple_fields()
{
    add_meta_box(
        'winbiz-slider-metabox-multiple-fields',
        WINBIZ_SLIDER_POST_TYPE,
        'ws_add_multiple_fields',
        WINBIZ_SLIDER_POST_TYPE
    );
}

function ws_add_multiple_fields()
{
    global $post;
    // Get Value of Fields From Database
    $ws_editor_name = get_post_meta($post->ID, WINBIZ_SLIDER_CUSTOM_FIELD_EDITOR, true);
    $ws_price = get_post_meta($post->ID, WINBIZ_SLIDER_CUSTOM_FIELD_PRICE, true);
    ?>
    <div class="col-6">
        <div class="label"><b>Editor</div>
        <div class="fields"><input type="text" name="<?php echo WINBIZ_SLIDER_CUSTOM_FIELD_EDITOR; ?>"
                                   value="<?php echo $ws_editor_name; ?>">
        </div>
    </div>
    <div class="col-6">
        <div class="label"><b>Price</b></div>
        <div class="fields"><input type="text" name="<?php echo WINBIZ_SLIDER_CUSTOM_FIELD_PRICE; ?>" value="<?php echo $ws_price; ?>"></div>
    </div>
    <?php
}

function ws_save_multiple_fields_metabox()
{
    global $post;

    if (isset($_POST["ws_editor_name"])) :
        update_post_meta($post->ID, WINBIZ_SLIDER_CUSTOM_FIELD_EDITOR, $_POST[WINBIZ_SLIDER_CUSTOM_FIELD_EDITOR]);
    endif;

    if (isset($_POST["ws_price"])) :
        update_post_meta($post->ID, WINBIZ_SLIDER_CUSTOM_FIELD_PRICE, $_POST[WINBIZ_SLIDER_CUSTOM_FIELD_PRICE]);
    endif;
}

//All action hooks
add_action('elementor/widgets/register', 'register_slider_widget');
add_action('elementor/frontend/after_enqueue_styles', 'frontend_styles');
add_action('add_meta_boxes', 'ws_metabox_mutiple_fields');
add_action('save_post', 'ws_save_multiple_fields_metabox');
