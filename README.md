# PHP Coding Style validator #

PHP Code Sniffer based coding standard checker I use in all my projects, so it may
most likely not fit your own needs, yet feel free to fork and adjust


## Installation ##

Use composer to install this package:

    composer require --dev marcin-orlowski/coding-standard


## Command line ##

Package installs `check-coding-standard` script in `vendor/bin` folder.
Use `-h` to see all available options.


## Using standard with PHP Storm / InteliJ ##

* Install `coding-standard`
* Go to `Settings` / `Editor` / `Inspections`
* In `PHP` inspection group select `PHP Code Sniffer validation` and enable it
* Set `Coding Standard` to `Custom`
* Click `...` next to it and select `<YOUR-PROJECT-DIR>/vendor/marcin-orlowski/coding-standard` folder


## License ##

* Created by Marcin Orlowski
* Response Builder is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
