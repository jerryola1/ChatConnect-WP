<?php
// If uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Delete options from the options table
delete_option('ai_chatbot_code');
delete_option('ai_chatbot_whatsapp_number');
