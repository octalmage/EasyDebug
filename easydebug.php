<?php
/**
 * Plugin Name: Easy Debug
 * Description: Easily disable plugins and switch to a default theme using query strings.
 * Version: 0.0.1
 * Author: Jason Stallings
 * Author URI: http://github.com/octalmage/
 */

add_action("init","easydebug_filters");

add_filter("pre_option_active_plugins", "easydebug_plugins");
add_filter("pre_site_option_active_sitewide_plugins", "easydebug_plugins");

function easydebug_filters()
{
    add_filter("template", "easydebug_theme");
    add_filter("stylesheet", "easydebug_theme");
}

function easydebug_theme($theme)
{
    if ($_GET["defaulttheme"]==1)
    {   
        return "twentyfifteen";
    }   
    return $theme;
}


function easydebug_plugins($plugins)
{
    if ($_GET["disableplugins"]==1)
    {   
        return array();
    }   

    return $plugins;
}

?>
