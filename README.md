# Modern Dark Mode WordPress

A sleek, efficient dark/light mode switcher plugin for WordPress websites. Works best with Twenty Twenty-Five Block Editor theme.


## Features

- Easy Toggle: A simple button lets users switch modes instantaneously.
- System Theme: Switch theme automatically by native theme.
- Performance-Oriented: No plugin needed!

## Installation

1. Add head and body scripts to child theme functions.php
2. Add CSS to your custom CSS.
3. Add buttons as you like.

## Example functions.php

```
function light_dark_header() {
?>
    <!-- Your header <script> code here -->
<?php
}
add_action('wp_head', 'light_dark_header');

function light_dark_body()
{
?>
    <!-- Your body <script> code here -->
<?php
}
add_action('wp_body_open', 'light_theme_switch', 5);
```


## Changelog

### 1.0

- Initial release with dark mode toggle functionality.

### 1.1

- Refactor and added the theme reset functionality
