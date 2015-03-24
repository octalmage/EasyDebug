<?php
/**
 * Plugin Name: Easy Debug
 * Description: Easily disable plugins and switch to a default theme using query strings. 
 * Version: 0.0.1
 * Author: Jason Stallings
 * Author URI: http://github.com/octalmage/
 */

add_action("plugins_loaded","easydebug_filters");

function easydebug_filters ()
{
    add_filter("template", "easydebug");
    add_filter("stylesheet", "easydebug");
}

function easydebug($theme)
{
    if ($_GET["defaulttheme"]==1)
    {
            return "twentyfifteen";
    }
    return $theme;
}

?>