[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

Beyond Grit
===
Theme for wordpress

Fonts
-----

If you want to change fonts, do it in the enqueue scripts function in functions.php, but then update footer.php with the fonts to load using [fontfaceobserver script](https://github.com/bramstein/fontfaceobserver). Then update the fonts in variables-site > typography. For more on how I'm using cookies to check for font caching, see [Filament Group article](https://www.filamentgroup.com/lab/font-events.html).

Getting Started
---------------

Branches
--------
Phase1 branch includes a working theme featuring a selection of "resource" links on the home page. To add resource menus back in, use:

      print_menu_if_exists('Critical Thinking Resources', 'Resources');

 

