# Aurem nano PHP framework #

Very simple PHP framework which should speedup small webapps development.

## Basic principles ##

### Routing ###
Just define function **route_posts_list** which will automatically be mapped into URL **/posts/list**.

Array returned by this function is passed to view rendering, e.g. **return array('post'=>$db->post[1])** will be passed to view file as **$post**.

### Templates ###
**/posts/list** automatically loads view template from **views/posts_list.html.php**, header and footer is loaded from views/layout directory.

### Data persistence ###
This framework does not provide this functionality, bud I can recommend project http://notorm.com.

## Examples ##

You can either look how to use **anpf** or use them as a skeleton for your own webapp.

*   1_static - the simplest example which handles requests into rendering action files an templates.
*   2_forms - example with handling data from form, TODO
*   3_blog - simple blog storing data in database (by notorm), TODO

## Note ##
This "framework" is inspired by Ruby on Rails, so it is based on MVC architecture. Please, use Rails or Sinatra if you can choose between Ruby and PHP;-)

## Author ##
Marek Aufart, https://twitter.com/auficz

## License ##
This project is open source software and is distributed under MIT license.
