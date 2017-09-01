[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

# Beyond Grit

## A theme for wordpress

### How to install

* Start with a working version of Wordpress using MAMP locally, some other technique, or on a remote server
* Place the theme into wp-content/themes/ directory
* Enable the theme using Wordpress admin tools.

### Update on the research2action website

* Log in and go to `/research2action/wp-content/themes/beyond_grit`
* Copy over any new files
* Install/update any necessary plugins

### Site Structure

This site is a page-based site with static homepage and a blog.

Enabling the blog along with the static homepage requires:
* Create a file called front-page.php. This is a static page with custom content that pulls in parts of several pages.
* Create a new page called "home" with no content.
* Create a new page called "blog" with no content.
* Go to Settings > Reading and set front page to display "Static Page."
* Set front page to display "home"
* Set posts page to display "blog"
Note: Optionally add a home.php file if you want to customize the display of the posts aggregation page. Home.php does not replace front-page.php because it's only for posts.

Navigation
----------

The navigation uses one menu: 'Primary Menu'. This is a change from earlier versions of the site, which used a front-page-menu as well as the primary version. The navigation is rendered in `header.php` Note that there is conditional logic to wrap the navigation in different classes depending on whether it is on the home page or not.

Fonts
-----

If you want to change fonts, do it in the enqueue scripts function in functions.php, but then update footer.php with the fonts to load using [fontfaceobserver script](https://github.com/bramstein/fontfaceobserver). Then update the fonts in variables-site > typography. For more on how I'm using cookies to check for font caching, see [Filament Group article](https://www.filamentgroup.com/lab/font-events.html).

Getting Started
---------------
Theme makes use of several page templates. The main research areas under navigation all point to pages that are designed according to the page-templates/research-area.php file. The Itzel Story uses itzel-story.php. As of now, no pages use the standard page.php template.

Branches
--------
Phase1 branch includes a working theme featuring a selection of "resource" links on the home page. To add resource menus back in, use:

      print_menu_if_exists('Critical Thinking Resources', 'Resources');
