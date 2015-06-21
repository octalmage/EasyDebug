# EasyDebug
Easily disable plugins and switch to a default theme using query strings.

### Instructions. 

Currently this plugin needs to be installed to the mu-plugins directory. 

Once installed, add the query string `?theme=<number|theme_name>` to the end of the url to switch to a default theme if using a number, or a named theme (e.g., `?theme=0` or `?theme=headway`).

For disabling plugins, you would add `?disableplugins=1` as a query argument to disable plugins. 

You can use these both at the same time too! You would add the following at the end of a URL: `?disableplugins=1&theme=0`.
