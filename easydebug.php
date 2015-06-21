<?php
/**
 * Plugin Name: Easy Debug
 * Description: Easily disable plugins and switch to a default theme using query strings.
 * Version: 0.0.2
 * Author: Jason Stallings, John Dittmar
 * Author URI: http://github.com/octalmage/
 */

add_filter("pre_option_template", "easydebug_theme");
add_filter("pre_option_stylesheet", "easydebug_theme");

add_filter("pre_option_active_plugins", "easydebug_plugins");
add_filter("pre_site_option_active_sitewide_plugins", "easydebug_plugins");

function easydebug_theme($theme)
{
    if ( isset($_GET["theme"]) )
    {   
        $themes = wp_get_themes();

        if ( array_key_exists($_GET["theme"], $themes) )
        {
            return $_GET["theme"];
        }

        $default_themes = array_filter(array_keys($themes), function($k) 
        {
            return strpos($k, 'twenty') !== false;
        }); 

        $default_themes = array_intersect(array_keys($themes), $default_themes);

        if ( !empty($default_themes) ) 
        {
            $index = 0;
            if ( is_numeric($_GET["theme"]) ) 
            {
                $requested_index = (int) $_GET["theme"];
                $index = isset($default_themes[$requested_index]) ? $requested_index : 0;
            }
            return $default_themes[$index]; 
        } 
    }   
    return $theme;
}


function easydebug_plugins($plugins)
{
    if ( $_GET["disableplugins"] == 1)
    {   
        return array();
    }   

    return $plugins;
}

?>
