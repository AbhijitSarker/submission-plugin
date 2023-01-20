<?php

/**
 * Plugin Name:       Submission Plugin
 * Plugin URI:        https://github.com/AbhijitSarker
 * Description:       Submit Your thoughts and get a email Reply.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Abhijit Sarker
 * Author URI:        https://github.com/AbhijitSarker
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       submission
 * Domain Path:       /languages
 */


if (!defined('ABSPATH')) {
    die;
}


if (!class_exists('SubmissionPlugin')) {
    class SubmissionPlugin
    {
        public function __construct()
        {
            define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
            // define('MY_PLUGIN_URL', plugin_dir_url(__FILE__));

            require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');
        }

        public function initialize()
        {
            include_once MY_PLUGIN_PATH . 'includes/utilities.php';

            include_once MY_PLUGIN_PATH . 'includes/options-page.php';
        }
    }

    $submissionPlugin = new SubmissionPlugin;

    $submissionPlugin->initialize();
}
