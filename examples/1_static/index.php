<?php

/** Anpf basic example - static pages routed and rendered by framework */

//include and initialize framework
require('../../src/anpf.php');
$f = new Anpf();

//define actions (index and error action must be defined)

function route_index() {
	
}

function route_error_404() {
	
}

//process action by Anpf
$f->run();

//thats all :-)