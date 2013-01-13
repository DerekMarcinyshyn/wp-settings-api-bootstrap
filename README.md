# WP Settings API Bootstrap

Contributors
------------

tareq1988 - [https://github.com/tareq1988/wordpress-settings-api-class](https://github.com/tareq1988/wordpress-settings-api-class)

Derek Marcinyshyn - [derek.marcinyshyn.com](http://derek.marcinyshyn.com)

* added new types -- about, colorpicker, and media

Description
-----------

WP Settings API Bootstrap is a WordPress class for plugin and theme developers to speed up development of their admin pages.

Features
--------

* Text input
* Textarea Input
* Checkbox
* Radio Button
* Multiple Checkbox
* Dropdown
* About ( just plain ol' html )
* WordPress Colorpicker
* WordPress Media Manager

TO DO
-----

Still need to build out Media Manager as it is requires some hard coding in javascript.

Usage Example Plugin
--------------------

Included is an example plugin displaying all of the available input fields.

```
<?php
// set a variable to get section
// returns an array object
$my_basic_settings = get_option('wp_settings_api_basics');
$my_advanced_settings = get_option('wp_settings_api_advanced');

// echo the Basic Settings text value
echo $my_basic_settings['text'];

// echo the Basic Settings textarea value
echo $my_basic_settings['textarea'];

// echo the Advanced Settings checkbox value
echo $my_advanced_settings['checkbox'];

?>
```

Notes
-----

Colorpicker needs a default color in order to work.

Screenshot
----------

![Option Panel](https://raw.github.com/DerekMarcinyshyn/wp-settings-api-bootstrap/master/screenshot.png "The options panel build on the fly using the PHP Class")