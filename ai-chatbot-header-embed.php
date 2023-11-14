<?php
/**
 * Plugin Name: ChatConnect: AI and WhtsApp Embedder WP
 * Description: Bring the power of AI chatbots and WhtsApp to your WordPress site with WP ChatConnect. A simple, versatile tool for embedding chat functionalities, enhancing user interaction and support. Ideal for businesses, bloggers, and e-commerce sites looking to engage visitors and provide prompt customer service.
 * Version: 1.0
 * Author: Abayomi Olagunju
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue Font Awesome for WhatsApp icon
function wp_chatconnect_enqueue_scripts() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_style('ai-chatbot-custom-style', plugin_dir_url(__FILE__) . 'assets/style.css');
}
add_action('wp_enqueue_scripts', 'wp_chatconnect_enqueue_scripts');

// Function to load your CSS
function ai_chatbot_enqueue_scripts() {
    // Enqueue your stylesheet - adjust the path as needed
    wp_enqueue_style('ai-chatbot-style', plugin_dir_url(__FILE__) . 'assets/style.css');
}

// Hook the above function to wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'ai_chatbot_enqueue_scripts');

// Embed chatbot or WhatsApp link
function ai_chatbot_header_embed() {
    $chatbot_code = get_option('ai_chatbot_code');
    $whatsapp_number = get_option('ai_chatbot_whatsapp_number');
    
    if ( ! empty($chatbot_code) ) {
        echo '<!-- AI Chatbot Embed Code -->' . "\n";
        echo $chatbot_code . "\n";
    }

    if ( ! empty($whatsapp_number) ) {
        echo '<a href="https://wa.me/' . esc_attr($whatsapp_number) . '" target="_blank" class="whatsapp-chat-link"><i class="fab fa-whatsapp"></i></a>';
    }
}

add_action('wp_head', 'ai_chatbot_header_embed');

// Admin menu settings
function ai_chatbot_admin_menu() {
    add_menu_page(
        'AI Chatbot Settings',
        'AI Chatbot Settings',
        'manage_options',
        'ai-chatbot-settings',
        'ai_chatbot_settings_page',
        'dashicons-admin-generic',
        110
    );
}

add_action('admin_menu', 'ai_chatbot_admin_menu');

// Include the settings page
function ai_chatbot_settings_page() {
    include_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
}
