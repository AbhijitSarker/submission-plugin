<?php
// require_once(MY_PLUGIN_URL . '/carbon-fields/carbon-fields-plugin.php');

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('after_setup_theme', 'submission_load');

function submission_load()
{
    require_once(MY_PLUGIN_PATH . 'vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'submission_attach_theme_options');
function submission_attach_theme_options()
{
    Container::make('theme_options', __('Submission'))
        ->set_icon('dashicons-format-status')
        ->add_fields(array(
            Field::make('checkbox', 'submission_active', __('Active')),

            Field::make('text', 'submission_recepient', 'Recepients')
                ->set_attribute('placeholder', 'Your Email')
                ->set_help_text('the email that the form submitted to'),

            Field::make('textarea', 'submissrion_messege', __('Confirmation Message'))
                ->set_attribute('placeholder', 'Eenter Confirmation Messege')
                ->set_help_text('Write the messege you want to send to submitter'),

        ));
}
