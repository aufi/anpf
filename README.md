Anpf
====

Aurem nano PHP framework

Very simple PHP framework which should speedup small webapps development based on MVC architecture.

Basic principles:

Routing - just define function route_posts_list which will automatically be mapped into URL /posts/list, array returned by this function is postponed to view rendering

Templates - /posts/list requests file with view template in views/posts_list or views/default, header and footer is loaded from view/layout directory

Data persistence - this framework does not provide this functionality, bud I can recomend project notorm.org



This "framework" is inspired by Ruby on Rails. Please, use Rails or Sinatra if you can choose between Ruby and PHP;-)


