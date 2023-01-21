<?php

add_shortcode('submission_code', 'show_submission_form');

function show_submission_form()
{
    require_once MY_PLUGIN_PATH . 'templates/submission-form.php';
}
