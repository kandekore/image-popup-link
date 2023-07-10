<?php
/*
Plugin Name: Image Popup Dropdown

Description: A plugin to display an image with title and popup dropdown on click
Version: 1.0
Author: D Kandekore

*/

if (!defined('ABSPATH')) {
    exit;
}

function ipd_register_custom_post_type() {
    $args = array(
        'public' => false,
        'show_ui' => true,
        'label'  => 'Image Dropdown Configs',
        'supports' => array('title')
    );
    register_post_type('ipd_image', $args);
}
add_action('init', 'ipd_register_custom_post_type');

function ipd_register_meta_boxes() {
    add_meta_box('ipd_metabox', 'Configuration', 'ipd_display_callback', 'ipd_image');
}
add_action('add_meta_boxes', 'ipd_register_meta_boxes');

function ipd_display_callback($post) {
    $image_url = get_post_meta($post->ID, '_ipd_image_url', true);
    $page_path = get_post_meta($post->ID, '_ipd_page_path', true);
    ?>
    <p>
        <label for="ipd-image-url-field">Image URL: </label>
        <input type="text" id="ipd-image-url-field" name="ipd_image_url" value="<?php echo esc_attr($image_url); ?>" size="25" />
    </p>
    <p>
        <label for="ipd-page-path-field">Page Path: </label>
        <input type="text" id="ipd-page-path-field" name="ipd_page_path" value="<?php echo esc_attr($page_path); ?>" size="25" />
    </p>
    <?php
}

function ipd_save_meta_box($post_id) {
    if (array_key_exists('ipd_image_url', $_POST)) {
        update_post_meta($post_id, '_ipd_image_url', $_POST['ipd_image_url']);
    }
    if (array_key_exists('ipd_page_path', $_POST)) {
        update_post_meta($post_id, '_ipd_page_path', $_POST['ipd_page_path']);
    }
}
add_action('save_post', 'ipd_save_meta_box');

function ipd_add_admin_page() {
    add_menu_page('Store Management', 'Store Management', 'manage_options', 'store-management', 'ipd_store_management_page', 'dashicons-store', 20);
}
add_action('admin_menu', 'ipd_add_admin_page');

function ipd_store_management_page() {
    $stores = get_option('ipd_stores', array());
    ?>
    <div class="wrap">
        <h2>Store Management</h2>
        <form method="post" action="options.php">
            <?php settings_fields('ipd-store-settings'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Stores:</th>
                    <td>
                        <?php 
                        $i = 0;
                        foreach ($stores as $store) { ?>
                            <div>
                                <input type="text" name="ipd_stores[<?php echo $i; ?>][name]" value="<?php echo esc_attr($store['name']); ?>" placeholder="Store Name" />
                                <input type="text" name="ipd_stores[<?php echo $i; ?>][url]" value="<?php echo esc_attr($store['url']); ?>" placeholder="Store URL" />
                            </div>
                        <?php 
                        $i++;
                        } ?>
                        <div>
                            <input type="text" name="ipd_stores[<?php echo $i; ?>][name]" value="" placeholder="Store Name" />
                            <input type="text" name="ipd_stores[<?php echo $i; ?>][url]" value="" placeholder="Store URL" />
                        </div>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function ipd_register_settings() {
    register_setting('ipd-store-settings', 'ipd_stores');
}
add_action('admin_init', 'ipd_register_settings');

function ipd_display_shortcode($atts) {
    $atts = shortcode_atts(array('id' => 0), $atts, 'ipd-display');
    $id = intval($atts['id']);
    $image_url = get_post_meta($id, '_ipd_image_url', true);
    $page_path = get_post_meta($id, '_ipd_page_path', true);
    $title = get_the_title($id);

    $stores = get_option('ipd_stores', array());

    $output = "<div class='ipd-container'>";
    $output .= "<img src='$image_url' alt='$title' class='ipd-image' id='popupBtn'>";
    /*** Anuj */
    $output .= "<div class='popup' id='popup' style='display:none;'>";
    $output .= "<div class='popup-content'>"; 
    $output .= "<div>Choose You Store</div>";
    $output .= "<span id='closeBtn'>&times;</span>";

        $output .= "<select class='ipd-select' onchange='window.open(this.value)'>";
        foreach ($stores as $store) {
            $output .= "<option value='".$store['url']."/".$page_path."'>".trim($store['name'])."</option>";
        }
        $output .= "</select>";
    
    $output .= "</div>";
    $output .= "</div>";    
    /*** Anuj */
    $output .= "</div>";

    return $output;
}
add_shortcode('ipd-display', 'ipd_display_shortcode');

function ipd_enqueue_scripts() {
    wp_enqueue_script('ipd_script', plugin_dir_url(__FILE__) . 'ipd.js', array(), '1.9', true);
    wp_enqueue_style('ipd_style', plugin_dir_url(__FILE__) . 'ipd.css', array(), '1.9');
}
add_action('wp_enqueue_scripts', 'ipd_enqueue_scripts');
