<?php

defined('BASEPATH') or exit('No direct script access allowed.');

/**
 * Template helper functions.
 *
 * @author Ivan Tcholakov <ivantcholakov@gmail.com>, 2012-2016
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Some original functions from Phil Sturgeon have been taken as a starting point
 */
// Functions by Phil Sturgeon (with minor modifications).
//------------------------------------------------------------------------------
function &ci()
{
    return get_instance();
}
if (!function_exists('template_title')) {
    function template_title()
    {
        $data = &ci()->load->_ci_cached_vars;
        if (isset($data['template']['title']) && $data['template']['title'] != '') {
            echo '
			<title>'.$data['template']['title'].'</title>';
        }
    }
}

if (!function_exists('template_metadata')) {
    function template_metadata()
    {
        $data = &ci()->load->_ci_cached_vars;
        if (isset($data['template']['metadata'])) {
            echo $data['template']['metadata'];
        }
    }
}

if (!function_exists('template_body')) {
    function template_body() {
        $data =& ci()->load->_ci_cached_vars;
        if (isset($data['template']['body'])) {
            echo $data['template']['body'];
        }
    }

}

if (!function_exists('template_partial')) {
    function template_partial($name) {
        $name = (string) $name;
        $data =& ci()->load->_ci_cached_vars;

        if (isset($data['template']['partials'][$name])) {
            echo $data['template']['partials'][$name];
        }
    }
}

if (!function_exists('template_partial_exists')) {
    function template_partial_exists($name) {
        $name = (string) $name;
        $data =& ci()->load->_ci_cached_vars;
        return isset($data['template']['partials'][$name]);
    }

}

if (!function_exists('template_has_partial')) {
    // Added by Ivan Tcholakov, 19-JAN-2016.
    // An alias of template_partial_exists()
    function template_has_partial($name) {
        return template_partial_exists($name);
    }

}
//
// if (!function_exists('file_partial')) {
//
//     function file_partial($file) {
//
//         $file = (string) $file;
//
//         $data =& ci()->load->_ci_cached_vars;
//
//         $file_found = null;
//
//         if (isset($data['template_views'])) {
//
//             $base_path = $data['template_views'];
//             $file_found = $base_path.'partials/'.$file;
//         }
//
//         if ($file_found === null) {
//
//             $base_path = VIEWPATH;
//             $file_found = $base_path.'partials/'.$file;
//         }
//
//         // if ($file_found === null) {
// 				//
//         //     $base_path = $base_path = COMMONPATH.'views/';
//         //     $file_found = ci()->parser->find_file($base_path.'partials/'.$file);
//         // }
//
//         if ($file_found === null) {
//             return;
//         }
// 				$this->template->set_partial($file, $file_found);
// 				echo $data['template']['partials'][$file];
//
//         // echo ci()->load->_ci_load(array(
//         //     '_ci_path' => $file_found,
//         //     '_ci_return' => TRUE
//         // ));
//     }
//
// }

if (!function_exists('template_breadcrumbs')) {
    function template_breadcrumbs() {
        $data =& ci()->load->_ci_cached_vars;
        return isset($data['template']['breadcrumbs']) ? $data['template']['breadcrumbs'] : array();
    }

}
