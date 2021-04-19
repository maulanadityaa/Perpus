<?php

/**
 * CodeIgniter Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Brian Abraham : Dumet School
 * @link		https://dumetschool.com
 */

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('has_alert')) {
    function has_alert($type = '')
    {
        $CI = &get_instance();
        $alerts = $CI->alert->has_alert($type);

        if (!empty($alerts)) {
            return $alerts;
        }

        return false;
    }
}
