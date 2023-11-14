<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( isset($_POST['ai_chatbot_code'], $_POST['ai_chatbot_whatsapp_number']) ) {
    update_option('ai_chatbot_code', $_POST['ai_chatbot_code']);
    update_option('ai_chatbot_whatsapp_number', $_POST['ai_chatbot_whatsapp_number']);
    ?>
    <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
        <p><strong>Settings saved.</strong></p>
    </div>
    <?php
}

$chatbot_code = get_option('ai_chatbot_code');
$whatsapp_number = get_option('ai_chatbot_whatsapp_number');
?>

<div class="wrap">
    <h1>WP ChatConnect Settings</h1>
    <p>Enhance your website's interaction capabilities by embedding custom scripts or enabling a WhatsApp chat link. Use the fields below to configure your preferences.</p>
    
    <form method="post" action="">
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Embed Code/Script</th>
            <td>
                <textarea name="ai_chatbot_code" rows="5" cols="50"><?php echo esc_textarea($chatbot_code); ?></textarea>
                <p class="description">Enter any embeddable script here (e.g., chatbot, analytics, custom JavaScript). This will be added to the header of your site.</p>
            </td>
            </tr>
            
            <tr valign="top">
            <th scope="row">WhatsApp Number</th>
            <td>
                <input type="text" name="ai_chatbot_whatsapp_number" value="<?php echo esc_attr($whatsapp_number); ?>" />
                <p class="description">Enter your WhatsApp number to add a clickable WhatsApp icon to your site. If set, no need to add WhatsApp script above.</p>
            </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
</div>

