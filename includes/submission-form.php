<?php

add_shortcode('submission_code', 'show_submission_form');

function show_submission_form()
{
    require_once MY_PLUGIN_PATH . 'templates/submission-form.php';
}

add_action('rest_api_init', 'create_rest_endpoint');

function create_rest_endpoint()
{
    register_rest_route('v1/submission-form', 'submit', array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry'
    ));
}

function handle_enquiry($data)
{
    $params = $data->get_params();

    if (!wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
        return new WP_REST_Response('Message not sent', 422);
    }

    unset($params['_wpnonce']);
    unset($params['_wp_http_referer']);


    //send email message
    $headers = [];

    $admin_email = get_bloginfo('admin_email');
    $admin_name = get_bloginfo('name');

    $headers[] =  "From: {$admin_name} <{$admin_email}>";
    $headers[] =  "Reply-to: {$params['name']} <{$params['email']}>";
    $headers[] =  "Content-type: text/html";

    $subject = "New enquiry from {$params['name']}";

    $message = '';
    $message .= "<h1>message has been sent from {$params['name']}</h1></br>";

    foreach ($params as $label => $value) {
        $message .= '<strong>' . ucfirst($label) . '<strong>' . ':' . $value . '</br>';
    }

    wp_mail($admin_email, $subject, $message, $headers);

    return new WP_REST_Response('Message was sent', 200);
}
