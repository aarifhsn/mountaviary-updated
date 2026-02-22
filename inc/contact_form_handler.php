<?php
/**
 * Handle contact form submissions from the front-end. This file processes the form data, validates it, and sends an email to the site administrator. It also handles redirection back to the form page with success or error messages.
 * 
 */

add_action('admin_post_mountaviary_contact_form', 'mountaviary_handle_contact_form');
add_action('admin_post_nopriv_mountaviary_contact_form', 'mountaviary_handle_contact_form');

function mountaviary_handle_contact_form()
{

    // Verify nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'mountaviary_contact_nonce')) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }

    $name = sanitize_text_field($_POST['contact_name'] ?? '');
    $email = sanitize_email($_POST['contact_email'] ?? '');
    $subject = sanitize_text_field($_POST['contact_subject'] ?? 'New Contact Message');
    $message = sanitize_textarea_field($_POST['contact_message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }

    $to = get_option('admin_email');
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
    ];

    $body = "
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Subject:</strong> {$subject}</p>
    <p><strong>Message:</strong><br>{$message}</p>
  ";

    $sent = wp_mail($to, $subject, $body, $headers);

    wp_redirect(add_query_arg('contact', $sent ? 'success' : 'error', wp_get_referer()));
    exit;
}