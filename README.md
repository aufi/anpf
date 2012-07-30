# Aurem nano PHP framework #

Very simple PHP framework which should speedup small webapps development based on MVC architecture.

## Basic principles ##

### Routing ### 
Just define function route_posts_list which will automatically be mapped into URL /posts/list

Array returned by this function is passed to view rendering, e.g. return array('post'=>$db->post[1]) will be passed to view file as $post

### Templates ###
/posts/list requests file with view template in views/posts_list or views/default, header and footer is loaded from view/layout directory

### Data persistence ###
This framework does not provide this functionality, bud I can recomend project notorm.org


## Note ##
This "framework" is inspired by Ruby on Rails. Please, use Rails or Sinatra if you can choose between Ruby and PHP;-)

## License ##
This open source code is distributed under MIT license
