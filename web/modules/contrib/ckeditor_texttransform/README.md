## CKEditor Text Transform

A very simple module which provides transforming selected text
to new cases. You can transform selected text to uppercase,
lowercase or simply capitalize it.

**Available Transform Cases**

* Transform Text to Uppercase: Convert letters to uppercase
* Transform Text to Lowercase: Convert letters to lowercase
* Transform Capitalize: Capitalize each word of selected text
* Transform Switcher: Loop through all cases

### Requirements

CKEditor Module (Core)

CKEditor Text transform plugin:
https://ckeditor.com/addon/texttransform

### Install

Install module via composer:

```bash
composer require drupal/ckeditor_texttransform
drush en ckeditor_texttransform
```

1. Download the plugin from https://ckeditor.com/addon/texttransform.
2. Place the plugin in the root libraries' folder (/libraries).
3. Enable CKEditor Text Transform in the Drupal admin.
4. Configure your WYSIWYG toolbar to include the button(s).

### Maintainers

George Anderson (geoanders)
https://www.drupal.org/u/geoanders
